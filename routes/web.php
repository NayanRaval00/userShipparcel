<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\WareHouseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    /**Warehouse creation */
    Route::get('warehouse/create', [WareHouseController::class, 'show'])->name('create-warehouse');
    Route::post('/create-warehouse', [WareHouseController::class, 'create'])->name('create.warehouse');
});


/** User Authentication */
Route::get('/login', [UserAuthController::class, 'login'])->name('admin-login');
Route::post('/user-login', [UserAuthController::class, 'userLogin'])->name('custom.login.submit');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
