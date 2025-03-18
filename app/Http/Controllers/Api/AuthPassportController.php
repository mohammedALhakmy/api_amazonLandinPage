<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthRegisterResource;
use App\Http\Resources\AuthResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthPassportController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],[],[
            'name' => 'name',
            'email' => 'email',
            'password' => 'password',
        ]);
        if ($validator->fails()) {
            return ApiResponse::sendResponse(422,"Validation Error", $validator->messages()->all());
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
//     $user->createToken('AuthToken')->accessToken;
        $token = $user->createToken('AuthToken')->accessToken;
        return ApiResponse::sendResponse(201, "User registered successfully", [
            'user' => $user,
            'token' => $token,
        ]);
//        return  ApiResponse::sendResponse(201,"User registered successfully",  new AuthRegisterResource($user, $token));
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('AuthToken')->accessToken;

        return response()->json([
            'message' => 'User logged in successfully',
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    // ✅ تسجيل خروج المستخدم
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

}
