<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated {

    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
    
//        public function handle($request, Closure $next, $guard = null) {
//        if (Auth::user()->i_am == 1) {
//            return redirect(route('admin.dashboard'));
//        } else {
//            return redirect(route('login'));
//        }
//
//        return $next($request);
//    }

}
