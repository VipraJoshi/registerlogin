<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LoginController;

Route::get('/', [HomeController::class,'index']);
Route::post('/getState',[HomeController::class,'getstate']);
Route::post('/getCity',[HomeController::class,'getcity']);

Route::post('/registerstore',[UserController::class,'store']);

Route::group(['middleware' => 'City'], function () {
    Route::get('/citylist',[CityController::class,'index']);
});


Route::get('/login', [LoginController::class,'index']);
Route::post('/session', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout']);