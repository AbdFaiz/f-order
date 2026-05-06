<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            // 'email' => 'required|email',
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        $user = User::where('username', $credentials['username'])->first();

        if (! $user) {
            throw ValidationException::withMessages([
                'username' => 'Username Not Found',
            ]);
        }

        if (! Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'password' => 'Password Incorrect',
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login success',
            'token' => $token,
            'user' => $user,
        ], 200);
    }
}
