<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'is_admin' => false,
        ]);

        $token = $user->createToken('CustomerToken')->accessToken;

        return response()->json(['token' => $token, 'user' => new UserResource($user)]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = auth()->user();
        $token = $user->createToken('AuthToken')->accessToken;

        return response()->json(['token' => $token, 'user' => new UserResource($user)]);
    }
}

