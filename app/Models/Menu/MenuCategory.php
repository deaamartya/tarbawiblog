<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    protected $guard = [''];
    protected $table = 'category_news';

    protected $fillable = ['name', 'slug', 'category_id', 'status', 'clicked','image','icon'];

    public static function statuses()
    {
        return [
            1 => 'active',
            0 => 'inactive',
        ];
    }

    public function categories()
    {
        return $this->hasMany(MenuCategory::class, 'category_id');
    }

    public function childrenCategories()
    {
        return $this->belongsTo(MenuCategory::class, 'category_id');
    }

    public function data_news_menu_category()
    {
        return $this->belongsToMany(
            \App\Models\News\News::class,
            'news_category_news'
        );
    }

    public function posts()
    {
        return $this->hasMany(\App\Models\News\News::class, 'id')
            ->where('status', 1)
            ->latest();
    }
}
