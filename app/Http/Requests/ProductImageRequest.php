<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
    }

}
