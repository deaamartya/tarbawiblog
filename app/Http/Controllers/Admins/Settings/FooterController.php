<?php

namespace App\Http\Controllers\Admins\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings\Footer;
use Illuminate\Support\Str;

class FooterController extends Controller {

    public function index() {
        $this->data['data'] = Footer::orderBy('name', 'ASC')->get();
        return view('backend.menu.settings.footer.list', $this->data);
    }

    public function create() {

        return view('backend.menu.settings.footer.add');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $data = new Footer();
        $data->name = $request->name;
        $data->description = $request->description;
        $data->slug = Str::slug($request->name);
        $data->status = $request->status;
        $data->save();
        return redirect(route('footer.index'));
    }

    public function edit($id) {
        $data = Footer::findOrFail($id);
        $view['data'] = $data;
        return view('backend.menu.settings.footer.edit', $view);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $data = Footer::find($id);
        $data->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);
        return redirect(route('footer.index'));
    }

    function destroy($id) {
        $data = Footer::find($id);
        $data->delete();
        return redirect()->route('footer.index');
    }

}
