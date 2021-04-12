<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/', function () {
    return response()->json([
        'posts' => [
            'url' => url('/api/posts'),
            'child' => [
                'id' => [
                    'description' => 'id of posts',
                    'required' => true,
                ],
                'slug' => [
                    'description' => 'id of posts',
                    'required' => true,
                ],
                'search' => [
                    'description' => 'this path require params searchinput',
                    'sample' => url('/api/posts/search?searchinput={keyword}'),
                ],
                'sample' => url('/api/posts/{id}/{slug-of-post}'),
            ],
        ],
        'home' => [
            'list post' => url('/api/home'),
            'keys-object' => ['slide', 'news', 'categories', 'popular'],
        ],
        'category' => [
            'with_slug' => url('/api/category/{slug-of-categories}'),
            'without_slug' => url('/api/category'),
        ],
    ]);
});

Route::get('home', 'Api\homePages@index');
Route::get('persons', 'Api\homePages@persons');
Route::get('category/', 'Api\homePages@categories');
Route::get('category/{slug}', 'Api\homePages@ch');
Route::get('posts', 'Api\homePages@posts');
Route::get('posts/search', 'Api\homePages@search');
Route::get('posts/{id}/{title}', 'Api\homePages@article');
Route::get('videos', 'Api\homePages@videos');
Route::get('images/{loc}', 'Api\imageCompress@mobile');
/** */
Route::post('login', 'API\Users\UserController@login');
Route::post('register', 'API\Users\UserController@register');
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'API\Users\UserController@details');
});

Route::resource('products', 'API\Products\ProductController');
