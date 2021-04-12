<?php

namespace App\Http\Controllers;

class HomeController extends Controller {

    public function login() {
        return redirect(route('login'));
    }

}
