<?php

namespace App\Http\Controllers\Admins\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News\News;
use App\Models\Menu\MenuCategory;
use App\Models\News\News_Menu_Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $data = News::orderBy('created_at', 'desc')->get();
        $view['data'] = $data;

        $dt_menu_categories = MenuCategory::where('status', 1)->get();
        $view['dt_menu_categories'] = $dt_menu_categories;

        return view('backend.menu.news.list', $view);
    }

    public function create()
    {
        $category = MenuCategory::where('status', true)->get();
        $view['category'] = $category;
        return view('backend.menu.news.add', $view);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
        ]);
        $last = News::orderBy('id', 'desc')->first();
        $data = new News();
        $data['id2'] = isset($last->id) ? $last->id + 1 : 1;
        $data['title'] = $request->title;
        $data['sub_title'] = $request->sub_title;
        $data['slug'] = Str::slug($request->title);
        $data['embed'] = $request->embed;
        $data['detail'] = $request->detail;
        $data['tag'] = $request->tag;
        $data['status'] = $request->status;
        $data['author'] = Auth::user()->username;

        if ($request->schedule == 'on') {
            $data['schedule'] = 1;
        }

        if ($request->breaking == 'on') {
            $data['breaking'] = 1;
        }
        if ($request->featured == 'on') {
            $data['featured'] = 1;
        }
        if ($request->slide == 'on') {
            $data['slide'] = 1;
        }
        if ($request->status == 'on') {
            $data['status'] = 1;
        }

        if ($request->hasFile('img_news')) {
            $photo = $request->file('img_news');
            $ext = strtolower($photo->getClientOriginalExtension());
            $image_full_name = Str::slug($request->title) . '.' . $ext;
            $location =
                public_path('public/Images/News') . '/' . $image_full_name;
            Image::make($photo)
                // ->resize(850, 500)
                ->save($location);
            $data['img_news'] = $image_full_name;
        }
        if ($request->hasFile('img_landscape')) {
            $photo = $request->file('img_landscape');
            $ext = strtolower($photo->getClientOriginalExtension());
            $image_full_name = Str::slug($request->title) . '_landscape.' . $ext;
            $location =
                public_path('public/Images/News') . '/' . $image_full_name;
            Image::make($photo)
                ->save($location);
            $data['img_landscape'] = $image_full_name;
        }
        $data->save();
        foreach ($request->category_id as $id) {
            $CCI = new News_Menu_Category();
            $CCI->news_id = $data->id;
            $CCI->category_news_id = $id;
            $CCI->save();
        }
        //        dd($request);

        return redirect(route('news.index'));
    }

    public function edit($id)
    {
        $data = News::where('id', $id)
            ->with('news_menu_category')
            ->first();
        $view['data'] = $data;

        //        $category = MenuCategory::where('status', 1)->get();
        //        $view['category'] = $category;

        $dt_menu_categories = MenuCategory::where('status', 1)->get();
        $view['dt_menu_categories'] = $dt_menu_categories;

        return view('backend.menu.news.edit', $view);
    }

    public function update(Request $request, $id)
    {
        $data = News::FindOrFail($id);
        $data->title = $request->title;
        $data->sub_title = $request->sub_title;
        $data->slug = Str::slug($request->title);
        $data->detail = $request->detail;
        $data->tag = $request->tag;
        $data->author = Auth::user()->username;
        $data->status = true;
        $data->embed = $request->embed;
        if ($request->hasFile('img_news')) {
            $photo = $request->file('img_news');
            $ext = strtolower($photo->getClientOriginalExtension());
            $image_full_name = Str::slug($request->title) . '.' . $ext;
            $location =
                public_path('public/Images/News') . '/' . $image_full_name;
            //Image::make($photo)->save($location);
            Image::make($photo)
                // ->resize(850, 500)
                ->save($location);
            $data['img_news'] = $image_full_name;
        }
        if ($request->hasFile('img_landscape')) {
            $photo = $request->file('img_landscape');
            $ext = strtolower($photo->getClientOriginalExtension());
            $image_full_name = Str::slug($request->title) . '_landscape.' . $ext;
            $location =
                public_path('public/Images/News') . '/' . $image_full_name;
            Image::make($photo)
                ->save($location);
            $data['img_landscape'] = $image_full_name;
        }
        $data->save();
        if ($request->schedule == 'on') {
            $data['schedule'] = 1;
        } elseif ($request->schedule == '') {
            $data['schedule'] = 0;
        }

        if ($request->breaking == 'on') {
            $data['breaking'] = 1;
        } elseif ($request->breaking == '') {
            $data['breaking'] = 0;
        }

        if ($request->featured == 'on') {
            $data['featured'] = 1;
        } elseif ($request->featured == '') {
            $data['featured'] = 0;
        }

        if ($request->slide == 'on') {
            $data['slide'] = 1;
        } elseif ($request->slide == '') {
            $data['slide'] = 0;
        }

        if ($request->status == 'on') {
            $data['status'] = 1;
        } elseif ($request->status == '') {
            $data['status'] = 0;
        }

        $data
            ->news_menu_category()
            ->sync($request->input('menu_categories_id'));
        $data->save();
        return redirect(route('news.index'));
    }

    public function destroy($id)
    {
        $data = News::find($id);
        $path = public_path('public/Images/News') . '/' . $data->img_news;
        if ($data->img_news == null) {
            $data->delete();
        } else {
            unlink($path);
        }
        $data->delete();
        return redirect()->back();
    }

    public function publish($id)
    {
        News::where('id', $id)->update(['status' => 1]);
        return back();
    }

    public function unpublish($id)
    {
        News::where('id', $id)->update(['status' => 0]);
        return back();
    }
}
