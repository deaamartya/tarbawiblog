<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use App\Providers\RouteServiceProvider;

class Admin {

//    public function handle($request, Closure $next) {
////        return $next($request);
//        if (auth()->user()->i_am == 1) {
//            return redirect(route('admin.dashboard'));
//        }
//        return redirect(route('home'));
//    }

    public function handle($request, Closure $next) {
//        return $next($request);
        if (Auth::user()->i_am == true) {
            return $next($request);
        }
//        return redirect(route('home'));
        return redirect(RouteServiceProvider::HOME);
    }

}
