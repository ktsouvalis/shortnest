<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\MyAuthentication;

Route::get('/mocking', function () {
    return response()->json(['message' => 'Forbidden'], 403);
})->name('login');

Route::post('/register', [UserController::class, 'register']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/shorten', [UrlController::class, 'shorten'])->name('shorten')->middleware('throttle:10,1');
    Route::get('/urls', [UrlController::class, 'index'])->name('urls.index');
    Route::get('/urls/{url}', [UrlController::class, 'show'])->name('urls.show');
});


