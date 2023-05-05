<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            $id = $_COOKIE['user'];
            $url = "http://116.108.153.26/";
            
            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json();//user chinh
            $alluser =  Http::withOptions(['verify' => false])->get($url . 'Newsfeed/AllUser/' . $id)->json();
            $allgroup =  Http::withOptions(['verify' => false])->get($url . 'Groups/Groups')->json();
            $post = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/Post/' . $id)->json();
            $friend = Http::withOptions(['verify' => false])->get($url . 'Account/MyFriend/' . $id)->json();
            $pro_user = Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json();//vi post nen ktra profile co trung vs user chinh ko 
            $friend_req = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/FriendRequest/' . $id)->json();
            return view('client.pages.home', ['post' => $post, 'alluser' => $alluser, 'allgroup' => $allgroup, 'user' => $user,'pro_user' => $pro_user, 'friend' => $friend, 'friend_req' => $friend_req]);
        }
    }
}
