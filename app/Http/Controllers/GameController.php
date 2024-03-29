<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    
    public function index()
    {
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            $id = $_COOKIE['user'];
            $url = "http://116.108.44.227/";

            $user =  Http::withOptions(['verify' => false])->get($url . 'Account/IsMe/' . $_COOKIE['user'])->json();//user chinh
            $alluser =  Http::withOptions(['verify' => false])->get($url . 'Newsfeed/AllUser/' . $id)->json();
            $notify = Http::withOptions(['verify' => false])->get($url . 'Newsfeed/Notify/' . $id)->json();
            $allgroup =  Http::withOptions(['verify' => false])->get($url . 'Groups/Groups')->json();
            $listchat = Http::withOptions(['verify' => false])->get($url . 'Account/ListChat/' . $id)->json();
            return view('client.pages.game.GameHome',['user'=> $user, 'notify' => $notify, 'alluser' => $alluser, 'listChat' => $listchat, 'allgroup' => $allgroup] );
        }
    }
    public function Menja()
    {
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            return view('client.pages.game.Menja');
        }
    }
    public function TheCube()
    {
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            return view('client.pages.game.TheCube');
        }
    }
    public function Game2048()
    {
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['token'])) {
            return view('client.pages.login');
        } else {
            return view('client.pages.game.Game2048');
        }
    }
}
