<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class previewNews extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        $time = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'slug' => $this->slug,
            'img_news' => url("images/News?filename=$this->img_news"),
            // 'img_news' => url("public/Images/News/$this->img_news"),
            'img_landscape' =>
                $this->img_landscape != null
                    ? url("images/News?filename=$this->img_landscape&width=500")
                    : url("images/News?filename=$this->img_news&width=500"),
            // $this->img_landscape != null
            //     ? url("public/Images/News/$this->img_landscape")
            //     : url("public/Images/News/$this->img_news"),
            'embed' => $this->embed,
            'tag' => explode(',', $this->tag),
            'category' => collect($this->news_menu_category)->pluck('id'),
            'categories' => $this->news_menu_category,
            'hit' => $this->hit,
            'created_at' => $time->diffForHumans(Carbon::now()),
        ];
    }
}
