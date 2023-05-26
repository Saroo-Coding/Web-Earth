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
            $url = "http://116.108.44.227/";

            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json(); //user chinh
            $alluser =  Http::withOptions(['verify' => false])->get($url . 'Newsfeed/AllUser/' . $id)->json();
            $allgroup =  Http::withOptions(['verify' => false])->get($url . 'Groups/Groups')->json();
            $post = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/Post/' . $id)->json();
            $friend = Http::withOptions(['verify' => false])->get($url . 'Account/MyFriend/' . $id)->json();
            $notify = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/Notify/' . $id)->json();
            $listchat = Http::withOptions(['verify' => false])->get($url . 'Account/ListChat/' . $id)->json();
            $pro_user = Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json(); //vi post nen ktra profile co trung vs user chinh ko 
            $friend_req = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/FriendRequest/' . $id)->json();
            return view('client.pages.home', ['post' => $post, 'alluser' => $alluser, 'allgroup' => $allgroup, 'listChat' => $listchat, 'user' => $user, 'notify' => $notify, 'pro_user' => $pro_user, 'friend' => $friend, 'friend_req' => $friend_req]);
        }
    }

    public function setting()
    {
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            $id = $_COOKIE['user'];
            $url = "http://116.108.44.227/";
            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json(); //user chinh
            $notify = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/Notify/' . $id)->json();
            $friend = Http::withOptions(['verify' => false])->get($url . 'Account/MyFriend/' . $id)->json();
            $alluser =  Http::withOptions(['verify' => false])->get($url . 'Newsfeed/AllUser/' . $id)->json();
            $allgroup =  Http::withOptions(['verify' => false])->get($url . 'Groups/Groups')->json();
            $listchat = Http::withOptions(['verify' => false])->get($url . 'Account/ListChat/' . $id)->json();
            return view('client.pages.setting', ['alluser' => $alluser, 'allgroup' => $allgroup, 'user' => $user, 'listChat' => $listchat, 'notify' => $notify, 'friend' => $friend,]);
        }
    }

    public function contribute()
    {
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            $id = $_COOKIE['user'];
            $url = "http://116.108.44.227/";
            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json(); //user chinh
            $notify = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/Notify/' . $id)->json();
            $alluser =  Http::withOptions(['verify' => false])->get($url . 'Newsfeed/AllUser/' . $id)->json();
            $allgroup =  Http::withOptions(['verify' => false])->get($url . 'Groups/Groups')->json();
            $listchat = Http::withOptions(['verify' => false])->get($url . 'Account/ListChat/' . $id)->json();
            return view('client.pages.header.contribute', ['alluser' => $alluser, 'allgroup' => $allgroup, 'user' => $user, 'listChat' => $listchat, 'notify' => $notify ]);
        }
    }

    public function support()
    {
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            $id = $_COOKIE['user'];
            $url = "http://116.108.44.227/";
            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json(); //user chinh
            $notify = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/Notify/' . $id)->json();
            $alluser =  Http::withOptions(['verify' => false])->get($url . 'Newsfeed/AllUser/' . $id)->json();
            $allgroup =  Http::withOptions(['verify' => false])->get($url . 'Groups/Groups')->json();
            $listchat = Http::withOptions(['verify' => false])->get($url . 'Account/ListChat/' . $id)->json();
            return view('client.pages.header.support', ['alluser' => $alluser, 'allgroup' => $allgroup, 'user' => $user, 'listChat' => $listchat, 'notify' => $notify]);
        }
    }
}
