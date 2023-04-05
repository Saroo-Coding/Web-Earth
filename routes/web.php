<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EarthController;
use App\Http\Controllers\ProfileController;
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


// ADMIN
Route::prefix('admin')->group(function (){ // thêm /admin sẵn

    Route::get('/', function () {
        return view('admin.layout.adminlayout');
    })->name('admin.adminlayout');
});