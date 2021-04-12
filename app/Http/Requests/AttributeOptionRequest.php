<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeOptionRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        $attributeID = (int) $this->get('attribute_id');
        $id = (int) $this->get('id');

        if ($this->method() == 'PUT') {
            $name = 'required|unique:attribute_options,name,' . $id . ',id,attribute_id,' . $attributeID;
        } else {
            $name = 'required|unique:attribute_options,name,NULL,id,attribute_id,' . $attributeID;
        }

        return [
            'name' => $name,
        ];
    }

}
