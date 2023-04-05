<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EarthController extends Controller
{
    
    public function login(){
        if(isset($_COOKIE['user']) || isset($_COOKIE['token'])){
            setcookie('user',null,time()-3600);
            setcookie('token',null,time()-3600);
        }
        return view('client.pages.login');
    }
    public function register(){
        return view('client.pages.register');
    }
}
