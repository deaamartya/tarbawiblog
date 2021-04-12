<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Categories\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller {

    public function index() {
        $this->data['data'] = Category::orderBy('name', 'ASC')->get();
        return view('backend.menu.categories.list', $this->data);
    }

    public function create() {
        $data = Category::orderBy('name', 'asc')->get();

        $this->data['data'] = $data->toArray();
        $this->data['category'] = null;

        return view('backend.menu.categories.form', $this->data);
    }

    public function store(CategoryRequest $request) {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);
        $params['parent_id'] = (int) $params['parent_id'];

        if (Category::create($params)) {
            Session::flash('success', 'Category has been saved');
        }
        return redirect('admin/category');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        $data = Category::where('id', '!=', $id)->orderBy('name', 'asc')->get();

        $this->data['data'] = $data->toArray();
        $this->data['category'] = $category;
        return view('backend.menu.categories.form', $this->data);
    }

    public function update(CategoryRequest $request, $id) {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);
        $params['parent_id'] = (int) $params['parent_id'];

        $category = Category::findOrFail($id);
        if ($category->update($params)) {
            Session::flash('success', 'Category has been updated.');
        }

        return redirect('admin/category');
    }

    public function destroy($id) {
        $category = Category::findOrFail($id);
        if ($category->delete()) {
            Session::flash('success', 'Category has been deleted');
        }
        return redirect()->back();
    }

}
