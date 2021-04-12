<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        if ($this->method() == 'PUT') {
            $code = 'required|unique:attributes,code,' . $this->get('id');
            $name = 'required|unique:attributes,name,' . $this->get('id');
        } else {
            $code = 'required|unique:attributes,code';
            $name = 'required|unique:attributes,name';
        }

        return [
            'code' => $code,
            'name' => $name,
            'type' => 'required',
        ];
    }

}
