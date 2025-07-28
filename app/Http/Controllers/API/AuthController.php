<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();

        $user = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
            'is_admin'  => false,
        ]);

        $token = $user->createToken('CustomerToken')->accessToken;

        return $this->successResponse(
            ['token' => $token, 'user' => new UserResource($user)],
            'User registered successfully',
            201
        );
    }

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials)) {
            return $this->errorResponse('Invalid credentials', 401);
        }

        $user  = auth()->user();
        $token = $user->createToken('AuthToken')->accessToken;

        return $this->successResponse(
            ['token' => $token, 'user' => new UserResource($user)],
            'User logged in successfully'
        );
    }

    protected function successResponse(mixed $data, string $message = '', int $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $status);
    }

    protected function errorResponse(string $message = 'Something went wrong', int $status = 400, mixed $errors = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $errors,
        ], $status);
    }
}
