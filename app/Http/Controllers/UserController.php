<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function login(Request $request)
    {
        try {
            $request->validate([
                'username' => ['required'],
                'password'=> ['required']
            ]);
            $credentials= request(['username', 'password']);
            if (!Auth::attempt($credentials)) {
                return response()->json("Credentials does'nt match", 401);
            }
            $tokenResult = auth()->user()->createToken('authToken')->plainTextToken;
            return response()->json(['Authorization'=> 'Bearer '.$tokenResult]);
        } catch (\Exception $error) {
             return response()->json($error->getMessage());
        }
    }
}
