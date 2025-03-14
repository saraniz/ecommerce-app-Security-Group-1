<?php

namespace App\Http\Controllers\buyer\auth;

use App\Http\Controllers\Controller;
use App\Mail\LoginAttemptMail;
use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view('buyer.auth.login');
    }

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|exists:users,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if (!User::where('email', $request->email)->exists()) {
            return response()->json(['error' => 'Invalid Credentials'], 401);
        }

        $user = User::where('email', $request->email)->first();

        if(!Hash::check($request->password, $user->password)){
            return response()->json(['error' => 'Invalid Credentials'], 401);
        }

        $token = hash('sha256', Str::random(60));

        Token::create([
            'user_id' => $user->id,
            'token_type' => 'auth token',
            'token' => $token,
            'expired_at' => Carbon::now()->addMinutes(120), 
        ]);

        $data =[
            'name' => $user->fullname,
            'device' => $request->header('User-Agent'),
            'time' => Carbon::now(),
        ];

        Mail::to($request->email)->send(new LoginAttemptMail($data));

        return redirect()->route('buyer.home')
                        ->withCookie(cookie('cusauthtoken',$token,120));
    }
}
