<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthService
{

    public function signIn(array $array)
    {
        try {
            $user = User::where('email', $array['email'])->first();
            if ($user && Hash::check($array['password'], $user->password)) {
                $token = $user->createToken('user-token')->plainTextToken;
                $data =  [
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'deviceId' => $user->deviceId,

                    ],
                    'accessToken' => $token,
                ];
                return response()->json([
                    'statusCode' => 200,
                    'message' => "Login successful",
                    'data' => $data,
                ]);
            } else {
                return response()->json([
                    'statusCode' => 200,
                    'message' => "Invalid Credentials",
                    'data' => null,
                ]);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
}
