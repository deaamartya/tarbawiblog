<?php

namespace App\Http\Resources\Products;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection {

    public function toArray($request) {
        return $this->collection;
    }

}
