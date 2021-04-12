<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu\MenuCategory;
use App\Models\Settings\General;
use App\Models\Settings\Seo;
use App\Models\Social\Social_Media;
use App\Models\Settings\Footer;

class AppServiceProvider extends ServiceProvider {

    public function register() {
        //
    }

    public function boot() {
        $menu = MenuCategory::where('status', 1)->get();
        View::share('menu', $menu);

        $Gsetting = General::findOrFail(1);
        View::share('Gsetting', $Gsetting);

        $Seo = Seo::findOrFail(1);
        View::share('Seo', $Seo);

        $Social = Social_Media::orderby('position', 'asc')->where('status', true)->get();
        View::share('Social', $Social);

        $foot = Footer::where('status', true)->get();
        View::share('foot', $foot);
    }

}
