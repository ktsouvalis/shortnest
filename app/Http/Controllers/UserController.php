<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterUserRequest;

class UserController extends Controller
{
    public function register(RegisterUserRequest $request)
    {

        $user = User::create($request->validated());
        $token = $user->createToken('auth_token')->plainTextToken;
        event(new Registered($user));
        
        return response()->json(['user' => $user, 'token' => $token, 'message' => 'Keep this token because you will not be able to see it again'], 201);
    }
}
