<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class previewCategory extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $avatar = url("images/Categories?filename=$this->icon&width=100");
        //url("public/Images/Categories/$this->icon");
        $image = url("images/Categories?filename=$this->image");
        //url("public/Images/Categories/$this->image");

        return [
            'id' => $this->id,
            'name' => $this->name,
            'category_id' => $this->category_id,
            'slug' => $this->slug,
            'status' => $this->status,
            'clicked' => $this->clicked,
            'icon' => $this->icon,
            'img_news' => $image,
            'avatar' => $this->icon != null ? $avatar : $image,
        ];
    }
}
