<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(RegisterUserRequest $request)
    {

        $user = User::create($request->validated());
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token, 'message' => 'Keep this token because you will not be able to see it again'], 201);
    }
}
