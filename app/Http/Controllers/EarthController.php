<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EarthController extends Controller
{
    
    public function login(){
        return view('client.pages.login');
    }
    
    public function register(){
        return view('client.pages.register');
    }

    public function forget(){
        return view('client.pages.forget');
    }
}
