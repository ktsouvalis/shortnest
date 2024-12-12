<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class CustomTokenAuth
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->query('api-token') ?? $request->bearerToken();

        if (!$token) {
            return response()->json(['message' => 'Token not provided'], 401);
        }

        $accessToken = PersonalAccessToken::findToken($token);

        if (!$accessToken || !$accessToken->tokenable) {
            return response()->json(['message' => 'Invalid or expired token'], 401);
        }

        $request->setUserResolver(function () use ($accessToken) {
            return $accessToken->tokenable;
        });

        return $next($request);
    }
}
