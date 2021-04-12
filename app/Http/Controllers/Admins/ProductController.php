<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductImageRequest;
use App\Models\Products\Product;
use App\Models\Categories\Category;
use App\Models\Attributes\Attribute;
use App\Models\Attributes\AttributeOption;
use App\Models\Products\ProductAttributeValue;
use App\Models\Products\ProductInventory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller {

    public function __construct() {
        $this->data['statuses'] = Product::statuses();
        $this->data['types'] = Product::types();
    }

    public function index() {
        $this->data['data'] = Product::orderby('created_at', 'desc')->get();
        return view('backend.menu.products.list', $this->data);
    }

    public function create() {
        $categories = Category::orderBy('name', 'ASC')->get();
        $configurableAttributes = $this->_getConfigurableAttributes();

        $this->data['categories'] = $categories->toArray();
        $this->data['product'] = null;
        $this->data['productID'] = 0;
        $this->data['categoryIDs'] = [];
        $this->data['configurableAttributes'] = $configurableAttributes;

        return view('backend.menu.products.form', $this->data);
    }

    private function _getConfigurableAttributes() {
        return Attribute::where('is_configurable', true)->get();
    }

    private function _generateAttributeCombinations($arrays) {
        $result = [[]];
        foreach ($arrays as $property => $property_values) {
            $tmp = [];
            foreach ($result as $result_item) {
                foreach ($property_values as $property_value) {
                    $tmp[] = array_merge($result_item, array($property => $property_value));
                }
            }
            $result = $tmp;
        }
        return $result;
    }

    private function _convertVariantAsName($variant) {
        $variantName = '';

        foreach (array_keys($variant) as $key => $code) {
            $attributeOptionID = $variant[$code];
            $attributeOption = AttributeOption::find($attributeOptionID);

            if ($attributeOption) {
                $variantName .= ' - ' . $attributeOption->name;
            }
        }

        return $variantName;
    }

    private function _generateProductVariants($product, $params) {
        $configurableAttributes = $this->_getConfigurableAttributes();

        $variantAttributes = [];
        foreach ($configurableAttributes as $attribute) {
            $variantAttributes[$attribute->code] = $params[$attribute->code];
        }

        $variants = $this->_generateAttributeCombinations($variantAttributes);

        if ($variants) {
            foreach ($variants as $variant) {
                $variantParams = [
                    'parent_id' => $product->id,
                    'sku' => $product->sku . '-' . implode('-', array_values($variant)),
                    'type' => 'simple',
                    'name' => $product->name . $this->_convertVariantAsName($variant),
                ];

                $variantParams['slug'] = Str::slug($variantParams['name']);

                $newProductVariant = Product::create($variantParams);

                $categoryIds = !empty($params['category_ids']) ? $params['category_ids'] : [];
                $newProductVariant->categories()->sync($categoryIds);

                $this->_saveProductAttributeValues($newProductVariant, $variant, $product->id);
            }
        }
    }

    private function _saveProductAttributeValues($product, $variant, $parentProductID) {
        foreach (array_values($variant) as $attributeOptionID) {
            $attributeOption = AttributeOption::find($attributeOptionID);

            $attributeValueParams = [
                'parent_product_id' => $parentProductID,
                'product_id' => $product->id,
                'attribute_id' => $attributeOption->attribute_id,
                'text_value' => $attributeOption->name,
            ];

            ProductAttributeValue::create($attributeValueParams);
        }
    }

    public function store(ProductRequest $request) {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);
//        $params['id'] = random_int(100000, 999999);
//        $params['id2'] = ($request['id']);
        $product = DB::transaction(
                        function () use ($params) {
                    $categoryIds = !empty($params['category_ids']) ? $params['category_ids'] : [];
                    $product = Product::create($params);
                    $product->categories()->sync($categoryIds);

                    if ($params['type'] == 'configurable') {
                        $this->_generateProductVariants($product, $params);
                    }

                    return $product;
                }
        );

        if ($product) {
            Session::flash('success', 'Product has been saved');
        } else {
            Session::flash('error', 'Product could not be saved');
        }

        return redirect('admin/products/' . $product->id . '/edit/');
    }

    public function edit($id) {
        if (empty($id)) {
            return redirect('admin/products/create');
        }

        $product = Product::findOrFail($id);
        $product->stock = isset($product->productInventory) ? $product->productInventory->stock : null;

        $categories = Category::orderBy('name', 'ASC')->get();

        $this->data['categories'] = $categories->toArray();
        $this->data['product'] = $product;
        $this->data['productID'] = $product->id;
        $this->data['categoryIDs'] = $product->categories->pluck('id')->toArray();

        return view('backend.menu.products.form', $this->data);
    }

    public function update(ProductRequest $request, $id) {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);

        $product = Product::findOrFail($id);

        $saved = false;
        $saved = DB::transaction(
                        function () use ($product, $params) {
                    $categoryIds = !empty($params['category_ids']) ? $params['category_ids'] : [];
                    $product->update($params);
                    $product->categories()->sync($categoryIds);

                    if ($product->type == 'configurable') {
                        $this->_updateProductVariants($params);
                    } else {
                        ProductInventory::updateOrCreate(['product_id' => $product->id], ['stock' => $params['stock']]);
                    }

                    return true;
                }
        );

        if ($saved) {
            Session::flash('success', 'Product has been saved');
        } else {
            Session::flash('error', 'Product could not be saved');
        }

        return redirect('admin/products');
    }

    private function _updateProductVariants($params) {
        if ($params['variants']) {
            foreach ($params['variants'] as $productParams) {
                $product = Product::find($productParams['id']);
                $product->update($productParams);

                $product->status = $params['status'];
                $product->save();

                ProductInventory::updateOrCreate(['product_id' => $product->id], ['stock' => $productParams['stock']]);
            }
        }
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);

        if ($product->delete()) {
            Session::flash('success', 'Product has been deleted');
        }

        return redirect()->back();
    }

}
