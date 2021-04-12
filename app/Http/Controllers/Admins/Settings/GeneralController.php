<?php

namespace App\Http\Controllers\Admins\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings\General;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class GeneralController extends Controller {

    public function index() {
        $data = General::first();
        $view['data'] = $data;

        return view('backend.menu.settings.general.list', $view);
    }

    function update(Request $request, $id) {
        $data = General::FindOrFail($id);
        $data['footer'] = $request->footer;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['fax'] = $request->fax;
        $data['email'] = $request->email;
        $data['title'] = $request->title;
        $data['populartag'] = $request->populartag;
        $data['privacy'] = $request->privacy;
        $data['sitemap'] = $request->sitemap;

        if ($request->hasFile('favicon')) {
            $photo = $request->file('favicon');
            $update_path = public_path('Images/Favicon') . '/' . $data->favicon;
            if ($data->favicon != null) {
                unlink($update_path);
            }

            $ext = strtolower($photo->getClientOriginalExtension());
            $image_full_name = Carbon::now()->format('Y-m-d') . '.' . $ext;
            $location = public_path('Images/Favicon') . '/' . $image_full_name;
            Image::make($photo)->save($location);
            $data->favicon = $image_full_name;
        }

        if ($request->hasFile('logo')) {
            $photo = $request->file('logo');
            $update_path = public_path('Images/Logo') . '/' . $data->logo;
            if ($data->logo != null) {
                unlink($update_path);
            }

            $ext = strtolower($photo->getClientOriginalExtension());
            $image_full_name = Carbon::now()->format('Y-m-d') . '.' . $ext;
            $location = public_path('Images/Logo') . '/' . $image_full_name;
            Image::make($photo)->save($location);
            $data->logo = $image_full_name;
        }
        $data->save();
        return back();
    }

}
