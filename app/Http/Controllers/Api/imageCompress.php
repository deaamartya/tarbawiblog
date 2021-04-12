<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;

class imageCompress extends Controller
{
    public function mobile(Request $request, $loc)
    {
        $this->validate($request, [
            'filename' => 'required',
            'width' => 'nullable',
        ]);
        $filename = $request->filename;
        $width = $request->width ? $request->width : 300;
        if (!file_exists(public_path("public/Images/$loc/$filename"))) {
            return response()->json(['message' => 'File not exist'], 500);
        }
        $path = file_get_contents(public_path("public/Images/$loc/$filename"));
        $img = Image::make($path);
        $img->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        return $img->response();
    }
}
