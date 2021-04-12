<?php

namespace App\Http\Controllers\Admins\Socials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Social\Social_Media;

class SocialController extends Controller {

    public function index() {
        $this->data['data'] = Social_Media::orderBy('name', 'ASC')->get();
        return view('backend.menu.social.list', $this->data);
    }

    public function create() {

        return view('backend.menu.social.add');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'link' => 'required',
            'position' => 'required',
        ]);
        $data = new Social_Media();
        $data->name = $request->name;
        $data->code = $request->code;
        $data->link = $request->link;
        $data->position = $request->position;
        $data->status = $request->status;
        $data->save();
        return redirect(route('social.index'));
    }

    public function edit($id) {
        $data = Social_Media::findOrFail($id);
        $view['data'] = $data;
        return view('backend.menu.social.edit', $view);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'link' => 'required',
            'position' => 'required',
        ]);

        $data = Social_Media::find($id);
        $data->update([
            'name' => $request->name,
            'code' => $request->code,
            'link' => $request->link,
            'position' => $request->position,
            'status' => $request->status,
        ]);
        return redirect(route('social.index'));
    }

    function destroy($id) {
        $data = Social_Media::find($id);
        $data->delete();
        return redirect()->route('social.index');
    }

    public function publish($id) {
        Social_Media::where('id', $id)->update(['status' => 1]);
        return back();
    }

    public function unpublish($id) {
        Social_Media::where('id', $id)->update(['status' => 0]);
        return back();
    }

}
