<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function showlogin()
    {
        return view('auth.login');
    }

}