<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EarthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [EarthController::class, 'login'])->name('login');
Route::get('/register', [EarthController::class, 'register'])->name('register');

// home
Route::get('/', [HomeController::class, 'index'])->name('home');

// CLIENT USER
Route::get('user/profile/{id}', [ProfileController::class, 'index'])->name('profile');
Route::get('user/friend/{id}', [ProfileController::class, 'friend'])->name('friend');
Route::get('user/image/{id}', [ProfileController::class, 'image'])->name('image');
Route::get('user/introduce/{id}', [ProfileController::class, 'introduce'])->name('introduce');

//Friend
Route::get('/friend', [FriendController::class, 'friend'])->name('friend');
Route::get('/requests', [FriendController::class, 'requests'])->name('requests');
Route::get('/suggestion', [FriendController::class, 'suggestion'])->name('suggestion');
Route::get('/list', [FriendController::class, 'listfriend'])->name('listfriend');

//Game
Route::get('/Menja', [GameController::class, 'Menja'])->name('Menja');
Route::get('/TheCube', [GameController::class, 'TheCube'])->name('TheCube');
Route::get('/Game2048', [GameController::class, 'Game2048'])->name('Game2048');

// ADMIN
Route::prefix('admin')->group(function (){ // thêm /admin sẵn

    Route::get('/', function () {
        return view('admin.layout.adminlayout');
    })->name('admin.adminlayout');
});