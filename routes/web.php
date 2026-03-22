<?php

use App\Http\Controllers\Panel\AuthController;
use App\Http\Controllers\Panel\ProductController;
use App\Http\Controllers\Panel\CategoryController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function (){

    Route::middleware('auth')->group(function () {

        Route::get('/categories/create',[CategoryController::class,'create'])
            ->name('categories.create');

        Route::post('/categories/create',[CategoryController::class,'store'])
            ->name('categories.store');

        Route::get('/',[CategoryController::class,'index'])
            ->name('admin-panel');

        Route::get('/logout', [AuthController::class, 'logout'])
            ->name('logout');
    });

    Route::get('/categories/{category}', function ($category) {
        return view('index');
    });
    Route::get('/categories/{category}/destroy', [CategoryController::class,'destroy'])
        ->name('categories.destroy');

    Route::get('/categories/{category}/edit', [CategoryController::class,'edit'])
        ->name('categories.edit');

    Route::post('/categories/{category}/edit', [CategoryController::class,'update'])
        ->name('categories.update');

    Route::prefix('/categories/{category}')->name('categories.')->group(function (){
    Route::get('/product', [ProductController::class,'index'])
        ->name('products.index');
    Route::get('/product/create', [ProductController::class,'create'])
        ->name('products.create');
    Route::post('/product/create', [ProductController::class,'store'])
        ->name('products.store');
    Route::get('/product/{product}/destroy', [ProductController::class,'destroy'])
        ->name('products.destroy');

        Route::get('/product/{product}/edit', [ProductController::class,'edit'])
            ->name('products.edit');



    Route::post('/product/{product}/edit', [ProductController::class,'update'])
        ->name('products.update');
    });
    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');

    Route::post('/loginSend', [AuthController::class, 'loginSend'])
        ->name('login.send');
});




