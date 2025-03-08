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
            return redirect()->route('buyer.login.form');
        }

        $tokenRecord = Token::where('token', $token)->first();

        if (!$tokenRecord) {
            return redirect()->route('buyer.login.form');
        }

        if ($tokenRecord->token_type!=='auth token'){
            return redirect()->route('buyer.login.form');
        }

        $currentTime = Carbon::now();
        $tokenExpiryTime = Carbon::parse($tokenRecord->expired_at);

        if ($currentTime->greaterThanOrEqualTo($tokenExpiryTime)) {
            return redirect()->route('buyer.login.form');
        }

        $userId = $tokenRecord->user_id;

        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('buyer.login.form');
        }

        $request->merge(['user_id' => $user->id]);

        return $next($request);
    }
}
