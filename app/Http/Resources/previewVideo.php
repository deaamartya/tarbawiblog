<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class previewVideo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $thumbnail = explode('/', $this->url)[4] ?? '';
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'status' => $this->status,
            'category' => $this->category,
            'url' => $this->url, #url("public/Images/Categories/$this->image"),
            'image' => "https://i.ytimg.com/vi/$thumbnail/hq720.jpg", #"<div class='figure'>$this->embed</div>", #url("public/Images/Categories/$this->image"),
        ];
    }
}
