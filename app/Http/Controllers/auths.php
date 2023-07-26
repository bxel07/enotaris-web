<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class auths extends Controller
{
    public function index()
    {
        return view('auths.login');
    }

    public function register() {
        return view('auths.register');
    }

    public function forgotPassword() {
        return view('auths.forgotPassword');
    }

    public function forgotPasswordLink() {
        return view('auths.forgotPasswordLink');
    }
}
