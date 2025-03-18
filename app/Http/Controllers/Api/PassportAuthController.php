<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthRegisterResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PassportAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return ApiResponse::sendResponse(422, "Registration Validation Errors", $validator->errors());
        }

        try {
            $user = User::create(array_merge($validator->validated(),
                ['password' => bcrypt($request->password)]
            ));

            $token = $user->createToken("UserToken");
            $accessToken = $token->accessToken;
            return ApiResponse::sendResponse(200, "Registration Successful", new AuthRegisterResource($user,$accessToken));

        } catch (\Exception $e) {
            Log::error('Error in register method', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function login(Request $request)
    {
        $validator = validator($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        $credentials = $request->only(['email', 'password']);
        if (auth()->attempt($credentials)){
            $user = auth()->user();
            $token = $user->createToken("UserToken")->accessToken;
            return response()->json([
                'token' => $token,
                'user' => $user,
                'message' => 'Login Successful'
            ], 200);
        }else{
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
    public function user()
    {
        $user = auth()->user();

        return response()->json([
            'user' => $user
        ],200);

    }
}
