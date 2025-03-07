<?php

namespace App\Http\Controllers\buyer\auth;

use App\Http\Controllers\Controller;
use App\Mail\OTPMail;
use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(){
        return view('buyer.auth.register');
    }

    public function register(Request $request)
    {
        if(User::where('email', $request->email)->exists()){
            return response()->json(['error'=>'User is already registerd.'],400);
        }

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
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

        $token = hash('sha256', Str::random(60));

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
        
        return redirect()->route('buyer.otp.form')
                     ->withCookie(cookie('custemptoken', $token, 10));
    }
}
