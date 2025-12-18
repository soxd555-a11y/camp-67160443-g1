<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('html101');
});

Route::get('/html101', function () {
    return view('template.default');
});
