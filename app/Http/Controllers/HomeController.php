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
            $url = "https://localhost:7126/";
            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json();
            $post = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/Post')->json();
            $friend = Http::withOptions(['verify' => false])->get($url . 'Account/MyFriend/' . $id)->json();
            $friend_req = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/FriendRequest/' . $id)->json();
            return view('client.pages.home', ['post' => $post, 'user' => $user, 'friend' => $friend, 'friend_req' => $friend_req]);
        }
    }
}
