<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        $parentId = (int) $this->get('parent_id');
        $id = (int) $this->get('id');

        if ($this->method() == 'PUT') {
            if ($parentId > 0) {
                $name = 'required|unique:categories,name,' . $id . ',id,parent_id,' . $parentId;
            } else {
                $name = 'required|unique:categories,name,' . $id;
            }

            $slug = 'unique:categories,slug,' . $id;
        } else {
            $name = 'required|unique:categories,name,NULL,id,parent_id,' . $parentId;
            $slug = 'unique:categories,slug';
        }

        return [
            'name' => $name,
            'slug' => $slug,
        ];
    }

}
