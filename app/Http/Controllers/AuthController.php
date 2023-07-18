<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showlogin() {
        return view('auth.login');
    }

    public function showregister() {
        return view('auth.register');
    }

    public function register (Request $request) {
        $validates = $request->validate([
            'name' => 'required|string|max:40',
            'email' => 'required|string|email|max:30|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);


        $user = User::create(array_merge(
            $validates,
            ['passowrd' => bcrypt($request->password)]
        ));
        return response()->json(['message' =>'Berhasil mendaftarkan akun!!']);
    }

    public function login (Request $request) {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if(!Auth::attempt($credentials)) {
            return response()->json(['mesaage' =>'Invalid login please check your email and password!!']);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['message'=>"Berhasil Login"]);
    }

    public function logout (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message'=>"Berhasil Logout"]);

    }
}
