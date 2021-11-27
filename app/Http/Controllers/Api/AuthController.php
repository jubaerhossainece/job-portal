<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){
        $user = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'unique:users', 'max:255'],
            'email' => ['required', 'string', 'email', 'email:rfc,dns', 'max:255', 'unique:users'],
            'university' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'current_company' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:4'],
        ]);

        $user = User::create([
            'name' => $user['name'],
            'phone_number' => $user['phone_number'],
            'email' => $user['email'],
            'university' => $user['university'],
            'department' => $user['department'],
            'current_company' => $user['current_company'],
            'position' => $user['position'],
            'password' => $user['password'],
        ]);

        $token = $user->createToken('riseupToken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }
}
