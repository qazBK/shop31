<?php

use App\Http\Controllers\Panel\AuthController;
use App\Http\Controllers\Panel\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('/',[CategoryController::class,'index'])
    ->name('admin-panel');

    Route::get('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

Route::get('/categories/{category}', function ($category) {
    return view('index');
});

Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/loginSend', [AuthController::class, 'loginSend'])
    ->name('login.send');


