<?php

namespace App\Http\Controllers\Admins\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings\Seo;

class SeoController extends Controller {

    public function index() {
        $data = Seo::first();
        $view['data'] = $data;

        return view('backend.menu.settings.seo.list', $view);
    }

    public function update(Request $request, $id) {
        $data = Seo::FindOrFail($id);
        $data['code_analytics'] = $request->code_analytics;
        $data['metakeyword'] = $request->metakeyword;
        $data->save();
        return back();
    }

}
