<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

Route::get('/', function () {

    return view('html101');
});

Route::get('/html101', function () {
    return view('template.default',);
});


Route::get('/MyController', [MyController::class, 'index']);
Route::post('/MyController', [MyController::class, 'store']);


Route::resource('/flights', App\Http\Controllers\FlightController::class);
