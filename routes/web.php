<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\LandingController@index')->name('landing');
Route::get('/ch/{slug}', 'Frontend\LandingController@ch')->name('ch.menu');
Route::get('/category/{slug}', 'Frontend\LandingController@category')->name(
    'category.menu'
);
Route::get('/footer/{slug}', 'Frontend\LandingController@footer')->name(
    'footslug.menu'
);

Route::get(
    '/{slug}/article/{newsid}/{nslug}',
    'Frontend\LandingController@article'
);
Route::get('/article2/{newsid}/{nslug}', 'Frontend\LandingController@article2');

Route::post('/load_data', 'Frontend\LandingController@load_data')->name(
    'loadmore.load_data'
);

Route::get('/autocomplete-ajax', [
    'uses' => 'Frontend\LandingController@ajaxData',
    'as' => 'autocomplete.ajax',
]);
Route::get('/search', [
    'uses' => 'Frontend\LandingController@search',
    'as' => 'search.data',
]);

Auth::routes(['register' => false]);
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/login', 'HomeController@login')->name('admin.login');

Route::group(
    ['prefix' => 'admin', 'middleware' => ['auth', 'admin']],
    function () {
        Route::get(
            'dashboard',
            'Admins\Dashboard\DashboardController@index'
        )->name('admin.dashboard');
        //Menu Category//
        Route::resource('menu-category', 'Admins\Menu\MenuCategoryController');
        Route::post(
            'menu-category/{id}',
            'Admins\Menu\MenuCategoryController@update'
        );
        //Advertisement//
        Route::resource(
            'advertisement',
            'Admins\Advertisements\AdvertisementController'
        );
        //News//
        Route::resource('news', 'Admins\News\NewsController');
        Route::get('/pb-news/{id}', [
            'uses' => 'Admins\News\NewsController@publish',
            'as' => 'pbSm',
        ]);
        Route::get('/upb-news/{id}', [
            'uses' => 'Admins\News\NewsController@unpublish',
            'as' => 'upbSm',
        ]);
        //Video//
        Route::resource('video', 'Admins\Videos\VideoController');
        Route::get('/pb-video/{id}', [
            'uses' => 'Admins\Videos\VideoController@publish',
            'as' => 'pbSm',
        ]);
        Route::get('/upb-video/{id}', [
            'uses' => 'Admins\Videos\VideoController@unpublish',
            'as' => 'upbSm',
        ]);
        //Footer//
        Route::resource('footer', 'Admins\Settings\FooterController');
        Route::resource('general', 'Admins\Settings\GeneralController');
        Route::resource('seo', 'Admins\Settings\SeoController');
        //Social Media//
        Route::resource('social', 'Admins\Socials\SocialController');
        Route::get('/pb-socmed/{id}', [
            'uses' => 'Admins\Socials\SocialController@publish',
            'as' => 'pbSm',
        ]);
        Route::get('/upb-socmed/{id}', [
            'uses' => 'Admins\Socials\SocialController@unpublish',
            'as' => 'upbSm',
        ]);

        Route::resource('manage/data', 'Admins\Management\DataController');
        Route::resource('manage/role', 'Admins\Management\RoleController');
        Route::resource('manage/user', 'Admins\Management\UserController');

        /* Subscribers Controller Start */
        Route::get('/subscribers', [
            'uses' => 'SubscriberController@index',
            'as' => 'subscribers',
        ]);
        Route::post('/subscribers', [
            'uses' => 'SubscriberController@store',
            'as' => 'subscribe',
        ]);
        Route::get('/subscribers-sheet', [
            'uses' => 'SubscriberController@csv',
            'as' => 'subscribeCsv',
        ]);
        Route::get(
            '/downloadExcel/{type}',
            'SubscriberController@downloadExcel'
        );
        Route::post('importExcel', 'SubscriberController@importExcel');
    }
);
