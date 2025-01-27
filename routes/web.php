<?php

use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/login', [UserAuthController::class, 'login'])->name('admin-login');
Route::post('/user-login', [UserAuthController::class, 'userLogin'])->name('custom.login.submit');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
