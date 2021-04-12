<?php

namespace App\Http\Controllers\Admins\Videos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Videos\Video;
use App\Models\Menu\MenuCategory;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function index()
    {
        $this->data['data'] = Video::orderBy('created_at', 'desc')->get();
        return view('backend.menu.video.list', $this->data);
    }

    public function create()
    {
        $dt_menu_categories = MenuCategory::where('category_id', 20)->get();
        $view['dt_menu_categories'] = $dt_menu_categories;
        $view['dt_categories'] = MenuCategory::whereNull('category_id')->get();
        return view('backend.menu.video.add', $view);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $data = new Video();
        $data->title = $request->title;
        $data->slug = Str::slug($request->title);
        $data->thumbnail = $request->thumbnail;
        $data->embed = $request->embed;
        $data->url = $request->url;
        $data->description = $request->description;
        $data->penceramah_id = $request->penceramah_id;
        $data->category_id = $request->category_id;
        $data->status = $request->status;
        $data->save();
        return redirect(route('video.index'));
    }

    public function edit($id)
    {
        $data = Video::findOrFail($id);
        $view['data'] = $data;
        $dt_menu_categories = MenuCategory::where('category_id', 20)->get();
        $view['dt_categories'] = MenuCategory::whereNull('category_id')->get();
        $view['dt_menu_categories'] = $dt_menu_categories;
        return view('backend.menu.video.edit', $view);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $data = Video::findOrFail($id);
        $data->title = $request->title;
        $data->slug = Str::slug($request->title);
        $data->thumbnail = $request->thumbnail;
        $data->embed = $request->embed;
        $data->url = $request->url;
        $data->penceramah_id = $request->penceramah_id;
        $data->category_id = $request->category_id;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->save();
        return redirect(route('video.index'));
    }

    function destroy($id)
    {
        $data = Video::find($id);
        $data->delete();
        return redirect()->route('social.index');
    }

    public function publish($id)
    {
        Video::where('id', $id)->update(['status' => 1]);
        return back();
    }

    public function unpublish($id)
    {
        Video::where('id', $id)->update(['status' => 0]);
        return back();
    }
}
