<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:' . User::class],
            'password' => ['required','confirmed','min:8',Password::defaults()],
        ],[],[
            'name' => 'name',
            'email' => 'email',
            'password' => 'password',
        ]);

        if ($validator->fails()) {
            return ApiResponse::sendResponse(422, "Register Validation Errors", $validator->messages()->all());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->createToken('auth_token')->plainTextToken;

        return ApiResponse::sendResponse(201, "User Account Created Successfully",new AuthResource($user));
//        return ApiResponse::sendResponse(201, "User Account Created Successfully",$data);
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required','string','email','max:255'],
            'password' => ['required'],
        ],[],[
            'email' => 'email',
            'password' => 'password',
        ]);

        if ($validator->fails()) {
            return ApiResponse::sendResponse(422, "Login Validation Errors", $validator->errors());
        }
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $user['token'] = $user->tokens()->delete();
            $user['email'] = $user->email;
            $user['name'] = $user->name;
            return ApiResponse::sendResponse(200, "User Logged In Successfully",new AuthResource($user));
        }else{
            return ApiResponse::sendResponse(401, "User Credentials doesn't match",[]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return ApiResponse::sendResponse(200, "User Logged Out Successfully",[]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
