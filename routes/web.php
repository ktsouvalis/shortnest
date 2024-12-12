<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/{something}', [UrlController::class, 'visit'])->name('visit');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function ($id, $hash) {
    // Retrieve the user by their ID
    $user = User::findOrFail($id);

    // Check if the URL is valid
    if (! URL::hasValidSignature(request())) {
        return response()->json(['message' => 'Invalid or expired verification link.'], 401);
    }

    // Check if the user has already verified their email
    if ($user->hasVerifiedEmail()) {
        return response()->json(['message' => 'Email already verified.']);
    }

    // Check if the hash matches the user's email
    if (! hash_equals(sha1($user->email), $hash)) {
        return response()->json(['message' => 'Invalid or expired verification link.'], 401);
    }

    // Mark the email as verified
    $user->markEmailAsVerified();

    return response()->json(['message' => 'Email successfully verified.']);
})->middleware(['signed'])->name('verification.verify');