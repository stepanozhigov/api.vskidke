<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(AuthRegisterRequest $request) {
        
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

        return response()->json($user,201);
    }

    public function login(AuthLoginRequest $request) {

        $credentials = request(['email','password']);
        if(!Auth::attempt($credentials)) {
            return response()->json('Authentication failed',500);
        }

        $user = User::where('email',$request->email)->first();
        $tokenResult = $user->createToken('authToken')->plainTextToken;

        return response()->json($tokenResult,200);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json('Token deleted',200);
    }
}
