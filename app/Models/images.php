<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    protected $table = 'images';
    protected $fillable = ['isLandscape', 'link', 'imageable_id', 'hasModel'];
    public $timestamps = false;
}
