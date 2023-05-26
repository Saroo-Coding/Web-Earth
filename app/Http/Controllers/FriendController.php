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
            $url = "http://116.108.44.227/";
            $alluser =  Http::withOptions(['verify' => false])->get($url . 'Newsfeed/AllUser/' . $id)->json();
            $allgroup =  Http::withOptions(['verify' => false])->get($url . 'Groups/Groups')->json();
            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json();
            $notify = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/Notify/' . $id)->json();
            $listchat = Http::withOptions(['verify' => false])->get($url . 'Account/ListChat/' . $id)->json();
            $friend_req = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/FriendRequest/' . $id)->json();
            return view('client.pages.friend.friend_home', [ 'user' => $user, 'alluser' => $alluser, 'listChat' => $listchat, 'notify' => $notify, 'allgroup' => $allgroup, 'friend_req' => $friend_req]);
        }
    }
    public function requests()
    {
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            $id = $_COOKIE['user'];
            $url = "http://116.108.44.227/";
            $alluser =  Http::withOptions(['verify' => false])->get($url . 'Newsfeed/AllUser/' . $id)->json();
            $allgroup =  Http::withOptions(['verify' => false])->get($url . 'Groups/Groups')->json();
            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json();
            $notify = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/Notify/' . $id)->json();
            $listchat = Http::withOptions(['verify' => false])->get($url . 'Account/ListChat/' . $id)->json();
            $req_friend = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/RequestFriend/' . $id)->json();
            return view('client.pages.friend.request', ['user' => $user, 'alluser' => $alluser, 'listChat' => $listchat, 'notify' => $notify, 'allgroup' => $allgroup, 'req_friend' => $req_friend]);
        }
    }
    public function suggestion()
    {
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            $id = $_COOKIE['user'];
            $url = "http://116.108.44.227/";
            $alluser =  Http::withOptions(['verify' => false])->get($url . 'Newsfeed/AllUser/' . $id)->json();
            $allgroup =  Http::withOptions(['verify' => false])->get($url . 'Groups/Groups')->json();
            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json();
            $notify = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/Notify/' . $id)->json();
            $new_friend =  Http::withOptions(['verify' => false])->get($url . 'Newsfeed/NewFriend/' . $id)->json();
            $listchat = Http::withOptions(['verify' => false])->get($url . 'Account/ListChat/' . $id)->json();
            return view('client.pages.friend.suggestion', ['user' => $user, 'alluser' => $alluser, 'listChat' => $listchat, 'notify' => $notify, 'allgroup' => $allgroup, 'new_friend' => $new_friend]);
        }
    }
    public function listfriend()
    {
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            $id = $_COOKIE['user'];
            $url = "http://116.108.44.227/";
            $alluser =  Http::withOptions(['verify' => false])->get($url . 'Newsfeed/AllUser/' . $id)->json();
            $allgroup =  Http::withOptions(['verify' => false])->get($url . 'Groups/Groups')->json();
            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json();
            $notify = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/Notify/' . $id)->json();
            $friend = Http::withOptions(['verify' => false])->get($url . 'Account/MyFriend/' . $id)->json();
            $listchat = Http::withOptions(['verify' => false])->get($url . 'Account/ListChat/' . $id)->json();
            return view('client.pages.friend.listfriend', ['user' => $user, 'alluser' => $alluser, 'listChat' => $listchat, 'notify' => $notify, 'allgroup' => $allgroup, 'friend' => $friend]);
        }
    }
}
