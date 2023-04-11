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
            return view('client.pages.game.Menja');
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
