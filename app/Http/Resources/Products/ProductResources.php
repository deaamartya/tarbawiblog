<?php

namespace App\Http\Resources\Products;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResources extends JsonResource {

    public function toArray($request) {
        return parent::toArray($request);
    }

}
