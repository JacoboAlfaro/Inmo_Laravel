<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request){
        try {
            $request->validate([
                'email'      => 'required|string|email|max:255|exists:users',
                'password'   => 'required|string|min:7',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], $e->status);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }


        $tokenType = 'Bearer';
        $user = User::where('email', $request['email'])->firstOrFail();

        // $user->tokens()->where('name', $tokenType)->delete(); //Opcional eliminar tokens anteriores

        $token = $user->createToken($tokenType);

        return response()->json([
            'token' => $token->plainTextToken,
            'type' => $tokenType
        ], 200);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Token revoked'
        ], 200); 
    }
}
