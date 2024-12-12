<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CustomTokenAuth;

Route::post('/register', [UserController::class, 'register']);

Route::resource('urls', UrlController::class)->middleware(CustomTokenAuth::class);
Route::group(['middleware' => CustomTokenAuth::class], function () {
    Route::post('/shorten', [UrlController::class, 'shorten'])->name('shorten')->middleware('throttle:10,1');
});


