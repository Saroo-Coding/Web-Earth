<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EarthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Route;

Route::get('/Login', [EarthController::class, 'login'])->name('login');
Route::get('/Register', [EarthController::class, 'register'])->name('register');
Route::get('/ForgetPass', [EarthController::class, 'forget'])->name('forgetPass');

// home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('Setting', [HomeController::class, 'setting'])->name('setting');
Route::get('Support', [HomeController::class, 'support'])->name('support');
Route::get('Contribute', [HomeController::class, 'contribute'])->name('contribute');

// CLIENT USER
Route::get('Profile/{id}', [ProfileController::class, 'index'])->name('profile');
Route::get('Friend/{id}', [ProfileController::class, 'friend'])->name('userfriend');
Route::get('Image/{id}', [ProfileController::class, 'image'])->name('image');
Route::get('Introduce/{id}', [ProfileController::class, 'introduce'])->name('introduce');

//Friend
Route::get('Friend', [FriendController::class, 'friend'])->name('friend');
Route::get('Requests', [FriendController::class, 'requests'])->name('requests');
Route::get('Suggestion', [FriendController::class, 'suggestion'])->name('suggestion');
Route::get('List', [FriendController::class, 'listfriend'])->name('listfriend');

//Game
Route::get('GameHouse', [GameController::class, 'index'])->name('gamehouse');
Route::get('Menja', [GameController::class, 'Menja'])->name('Menja');
Route::get('TheCube', [GameController::class, 'TheCube'])->name('TheCube');
Route::get('Game2048', [GameController::class, 'Game2048'])->name('Game2048');

//Group
//Route::get('Group/{id}', [GroupController::class, 'group'])->name('Group');
Route::get('Member/{id}', [GroupController::class, 'member'])->name('Member');
Route::get('Post/{id}', [GroupController::class, 'postgroup'])->name('Post');
Route::get('File/{id}', [GroupController::class, 'file'])->name('File');

// ADMIN
Route::prefix('admin')->group(function (){ // thêm /admin sẵn

    Route::get('/', function () {
        return view('admin.layout.adminlayout');
    })->name('admin.adminlayout');
});