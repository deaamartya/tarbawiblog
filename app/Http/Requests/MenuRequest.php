<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest {

//    public function authorize() {
//        return true;
//    }

    public function rules() {
        $parentId = (int) $this->get('category_id');
        $id = (int) $this->get('id');

        if ($this->method() == 'PUT') {
            if ($parentId > 0) {
                $name = 'required|unique:menu_categories,name,' . $id . ',id,category_id,' . $parentId;
            } else {
                $name = 'required|unique:menu_categories,name,' . $id;
            }

            $slug = 'unique:menu_categories,slug,' . $id;
        } else {
            $name = 'required|unique:menu_categories,name,NULL,id,category_id,' . $parentId;
            $slug = 'unique:menu_categories,slug';
        }

        return [
            'name' => $name,
            'slug' => $slug,
        ];
    }

}
