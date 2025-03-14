<?php

namespace App\Http\Controllers\buyer\auth;

use App\Http\Controllers\Controller;
use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function auth(Request $request){

        $token = $request->cookie('cusauthtoken');

        if (!$token) {
            return response()->json(['error' => 'Token not found in cookies.'], 400);
        }

        $tokenRecord = Token::where('token', $token)->first();

        if (!$tokenRecord) {
            return response()->json(['error' => 'Invalid or expired token.'], 400);
        }

        if ($tokenRecord->token_type!=='auth token'){
            return response()->json(['error' => 'Invalid token'], 400);
        }

        $currentTime = Carbon::now();
        $tokenExpiryTime = Carbon::parse($tokenRecord->expired_at);

        if ($currentTime->greaterThanOrEqualTo($tokenExpiryTime)) {
            return response()->json(['error' => 'Token has expired.'], 400);
        }

        $userId = $tokenRecord->user_id;

        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        return response()->json([
            'message' => 'User authenticated successfully',
            'user' => [
                'id' => $user->id,
                'name' => $user->fullname,
                'email' => $user->email,
            ]
        ]);

    }
    public function logout(Request $request)
    {
        $token = $request->cookie('cusauthtoken');

        if ($token) {

            $tokenRecord = Token::find($token);

            if ($tokenRecord) {
                $tokenRecord->expired_at = Carbon::now();
                $tokenRecord->save();
            }

            return response()->json(['message' => 'Logged out successfully'])
                ->withCookie(cookie()->forget('cusauthtoken'));
        }
        return response()->json(['message' => 'No active session found'], 400);
    }

}
