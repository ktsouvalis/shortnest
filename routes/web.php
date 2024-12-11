<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

Route::get('/{something}', [UrlController::class, 'visit'])->name('visit');