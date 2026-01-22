<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index');
});

Route::get('/categories/{category}', function ($category) {
    return view('index');
});

