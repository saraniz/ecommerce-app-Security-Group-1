<?php

namespace App\Http\Middleware;

use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
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

        $request->merge(['user_id' => $user->id]);

        return $next($request);
    }
}
