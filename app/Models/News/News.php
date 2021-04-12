<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu\MenuCategory;
class News extends Model
{
    protected $guarded = [''];
    protected $table = 'news';

    //    protected $fillable = ['title', 'status'];
    //    public $primaryKey = 'id';
    //    protected $casts = ['id' => 'string'];

    public function news_menu_category()
    {
        return $this->belongsToMany(
            \App\Models\Menu\MenuCategory::class,
            'news_category_news',
            'news_id',
            'category_news_id'
        );
    }

    public function news_menu_category2()
    {
        return $this->belongsToMany(
            \App\Models\Menu\MenuCategory::class,
            'news_category_news',
            'news_id',
            'category_news_id'
        );
    }

    public function category()
    {
        return $this->belongsTo('\App\Models\Menu\MenuCategory');
    }
}
