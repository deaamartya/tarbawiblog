<?php

namespace App\Http\Controllers\Admins\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Menu\MenuCategory;
use App\Http\Requests\MenuRequest;
use Illuminate\Support\Facades\Session;

class MenuCategoryController extends Controller
{
    public function __construct()
    {
        $this->data['statuses'] = MenuCategory::statuses();
    }

    public function index()
    {
        $data = MenuCategory::orderBy('created_at', 'desc')->get();
        $view['data'] = $data;
        return view('backend.menu.menu-category.list', $view);
    }

    public function create()
    {
        $menus = MenuCategory::orderBy('name', 'asc')->get();
        $this->data['menus'] = $menus->toArray();
        $this->data['menu'] = null;
        return view('backend.menu.menu-category.add', $this->data);
    }

    public function store(Request $request)
    {
        $menu = new MenuCategory();
        $menu->slug = Str::slug($request->name);
        $menu->name = $request->name;
        $menu->status = $request->status;
        if (!empty($request->category_id)) {
            $menu->category_id = $request->category_id;
        }
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $ext = strtolower($photo->getClientOriginalExtension());
            $image_full_name = Str::slug($request->name) . '.' . $ext;
            $location =
                public_path('public/Images/Categories') .
                '/' .
                $image_full_name;
            Image::make($photo)->save($location);
            $menu->image = $image_full_name;
        }
        if ($request->hasFile('icon')) {
            $photo = $request->file('icon');
            $ext = strtolower($photo->getClientOriginalExtension());
            $image_name = 'icon-'.Str::slug($request->name) . '.' . $ext;
            $location =
                public_path('public/Images/Categories') .
                '/' .
                $image_name;
            Image::make($photo)->save($location);
            $menu->icon = $image_name;
        }
        if ($menu->save()) {
            Session::flash('success', 'Category has been saved');
        }

        return redirect(route('menu-category.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = MenuCategory::findOrFail($id);
        $categories = MenuCategory::where('id', '!=', $id)
            ->orderBy('name', 'asc')
            ->get();

        $this->data['categories'] = $categories->toArray();
        $this->data['data'] = $data;

        return view('backend.menu.menu-category.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $menu = MenuCategory::findOrFail($id);
        $menu->slug = Str::slug($request->name);
        $menu->name = $request->name;
        $menu->status = $request->status;
        $menu->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $ext = strtolower($photo->getClientOriginalExtension());
            $image_full_name = Str::slug($request->name) . '.' . $ext;
            $location =
                public_path('public/Images/Categories') .
                '/' .
                $image_full_name;
            Image::make($photo)->save($location);
            $menu->image = $image_full_name;
        }
        if ($request->hasFile('icon')) {
            $photo = $request->file('icon');
            $ext = strtolower($photo->getClientOriginalExtension());
            $image_name = 'icon-'.Str::slug($request->name) . '.' . $ext;
            $location =
                public_path('public/Images/Categories') .
                '/'.
                $image_name;
            Image::make($photo)->save($location);
            $menu->icon = $image_name;
        }
        if ($menu->save()) {
            Session::flash('success', 'Category has been updated');
        }
        return redirect(route('menu-category.index'));
    }

    public function destroy($id)
    {
        $data = MenuCategory::findOrFail($id);

        if ($data->delete()) {
            Session::flash('success', 'Category has been deleted');
        }

        return redirect()->back();
    }
}
