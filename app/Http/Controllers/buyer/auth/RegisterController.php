<?php

namespace App\Http\Controllers\buyer\auth;

use App\Http\Controllers\Controller;
use App\Mail\OTPMail;
use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        if(User::when('email', $request->email)->exists()){
            return response()->json(['error'=>'User is already registerd.'],400);
        }

        $validator = Validator::make($request->all(),[
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $otp = random_int(100000, 999999);

        $redisKey = 'otp:'.$request->email;

        Redis::setex($redisKey, 600, $otp);

        $user = User::create([
            'fullname' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_verified' => false,
        ]);

        $currentDate = now()->format('Y-m-d_H:i:s');

        $tokenName = 'MyApp_otp_verify' . $request->email . '_' . $currentDate;

        $token = $user->createToken($tokenName)->plainTextToken;

        Token::create([
            'user_id' => $user->id,
            'token_type' => 'temp token',
            'token' => $token,
            'expired_at' => Carbon::now()->addMinutes(10), 
        ]);

        $data = [
            'name' => $request->name,
            'otp' => $otp,
        ];

        Mail::to($user->email)->send(new OTPMail($data));

        return response()->json(['message' => 'User registered successfully.'],201)->cookie('custoken', $token, 10);
    }

    public function verifyOtp(Request $request){
        $token = $request->cookie('custoken');

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

        $validator = Validator::make($request->all(), [
            'otp' => 'required|integer|digits:6', 
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $otp = $request->otp;

        $redisKey = 'otp:' . $email;
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

        $currentDate = now()->format('Y-m-d_H:i:s');

        $tokenName = 'MyApp_auth' . $request->email . '_' . $currentDate;

        $token = $user->createToken($tokenName)->plainTextToken;

        Token::create([
            'user_id' => $user->id,
            'token_type' => 'auth token',
            'token' => $token,
            'expired_at' => Carbon::now()->addMinutes(60),  // Adds 10 minutes from the current time
        ]);

        return response()->json([
            'message' => 'User registered successfully. Please verify OTP.',
            'user' => $user,
            'token' => $token,
        ])->cookie('token', $token, 120);
    }
}
