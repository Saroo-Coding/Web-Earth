<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FriendController extends Controller
{
    public function friend()
    {
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            $id = $_COOKIE['user'];
            $url = "https://localhost:7126/";
            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json();
            $friend_req = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/FriendRequest/' . $id)->json();
            return view('client.pages.friend.friend_home', [ 'user' => $user, 'friend_req' => $friend_req]);
        }
    }
    public function requests()
    {
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            $id = $_COOKIE['user'];
            $url = "https://localhost:7126/";
            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json();
            $req_friend = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/RequestFriend/' . $id)->json();
            return view('client.pages.friend.request', ['user' => $user, 'req_friend' => $req_friend]);
        }
    }
    public function suggestion()
    {
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            $id = $_COOKIE['user'];
            $url = "https://localhost:7126/";
            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json();
            $new_friend =  Http::withOptions(['verify' => false])->get($url . 'Newsfeed/NewFriend/' . $id)->json();
            
            return view('client.pages.friend.suggestion', ['user' => $user, 'new_friend' => $new_friend]);
        }
    }
    public function listfriend()
    {
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            $id = $_COOKIE['user'];
            $url = "https://localhost:7126/";
            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json();
            $friend = Http::withOptions(['verify' => false])->get($url . 'Account/MyFriend/' . $id)->json();
            return view('client.pages.friend.listfriend', ['user' => $user, 'friend' => $friend]);
        }
    }
}
