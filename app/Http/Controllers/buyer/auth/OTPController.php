<?php

namespace App\Http\Controllers\buyer\auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;

class OTPController extends Controller
{
    public function index(){
        return view('buyer.auth.otp');
    }
    
    public function verifyOtp(Request $request){
        $token = $request->cookie('custemptoken');

        if (!$token) {
            return response()->json(['error' => 'Token not found in cookies.'], 400);
        }

        $tokenRecord = Token::where('token', $token)->first();

        if (!$tokenRecord) {
            return response()->json(['error' => 'Invalid or expired token.'], 400);
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

        $email = $user->email;

        $otp = implode('', $request->otp);

        if (!preg_match('/^\d{6}$/', $otp)) {
            return back()->with('error', 'Invalid OTP format.');
        }

        $redisKey = 'otp:' . $email;
        Log::info('Redis Key: ' . $redisKey);
        $storedOtp = Redis::get($redisKey);

        if (!$storedOtp) {
            return response()->json(['error' => 'OTP has expired or does not exist.'], 400);
        }

        if ($storedOtp != $otp) {
            return response()->json(['error' => 'Invalid OTP.'], 400);
        }
        $id = $userId;
        $updateUser = User::find($id);

        if($updateUser){
            $updateUser->is_verified = true;
            $updateUser->save();
        }else{
            return response()->json(['message' => 'User not found'], 404);
        }

        $token = hash('sha256', Str::random(60));

        Token::create([
            'user_id' => $user->id,
            'token_type' => 'auth token',
            'token' => $token,
            'expired_at' => Carbon::now()->addMinutes(60),  
        ]);

        $data = [
            'name' => $user->fullname,
        ];

        Mail::to($email)->send(new WelcomeMail($data));

        return redirect()->route('buyer.home')
                     ->withCookie(cookie('cusauthtoken', $token, 10));

    }
}
