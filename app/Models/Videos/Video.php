<?php

namespace App\Models\Videos;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

    protected $guarded = [''];
    protected $table = 'video';
    public function category()
    {
        return $this->belongsTo(
            \App\Models\Menu\MenuCategory::class,
            'category_id',
            'id'
        );
    }
}
