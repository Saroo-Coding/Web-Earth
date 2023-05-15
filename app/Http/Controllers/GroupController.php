<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GroupController extends Controller
{
    public function member($groupId){
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            $id = $_COOKIE['user'];
            $url = "http://116.108.153.26/";
            
            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json();
            $group = Http::withOptions(['verify' => false])->get($url . 'Groups/Groups/' . $groupId)->json();
            $post = Http::withOptions(['verify' => false])->get($url . 'Groups/GroupPosts/' . $groupId)->json();
            $alluser =  Http::withOptions(['verify' => false])->get($url . 'Newsfeed/AllUser/' . $id)->json();
            $allgroup =  Http::withOptions(['verify' => false])->get($url . 'Groups/Groups')->json();
            $notify = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/Notify/' . $id)->json();
            return view('client.pages.group.member', ['post' => $post, 'alluser' => $alluser, 'notify' => $notify, 'allgroup' => $allgroup, 'user' => $user,'group' => $group]);
        }
    }
    public function postgroup($groupId){
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            $id = $_COOKIE['user'];
            $url = "http://116.108.153.26/";
            
            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json();
            $group = Http::withOptions(['verify' => false])->get($url . 'Groups/Groups/' . $groupId)->json();
            $post = Http::withOptions(['verify' => false])->get($url . 'Groups/GroupPosts/' . $groupId)->json();
            $alluser =  Http::withOptions(['verify' => false])->get($url . 'Newsfeed/AllUser/' . $id)->json();
            $allgroup =  Http::withOptions(['verify' => false])->get($url . 'Groups/Groups')->json();
            $notify = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/Notify/' . $id)->json();
            return view('client.pages.group.post-group', ['post' => $post, 'alluser' => $alluser, 'notify' => $notify, 'allgroup' => $allgroup, 'user' => $user,'group' => $group]);
        }
    }
    public function file($groupId){
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            $id = $_COOKIE['user'];
            $url = "http://116.108.153.26/";
            
            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $id)->json();
            $group = Http::withOptions(['verify' => false])->get($url . 'Groups/Groups/' . $groupId)->json();
            $post = Http::withOptions(['verify' => false])->get($url . 'Groups/GroupPosts/' . $groupId)->json();
            $alluser =  Http::withOptions(['verify' => false])->get($url . 'Newsfeed/AllUser/' . $id)->json();
            $allgroup =  Http::withOptions(['verify' => false])->get($url . 'Groups/Groups')->json();
            $notify = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/Notify/' . $id)->json();
            return view('client.pages.group.file', ['post' => $post, 'alluser' => $alluser, 'notify' => $notify, 'allgroup' => $allgroup, 'user' => $user,'group' => $group]);
        }
    }
}