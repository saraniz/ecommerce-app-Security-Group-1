<?php

namespace App\Http\Controllers\buyer\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotResetController extends Controller
{
    public function forgotIndex(){
        return view('buyer.auth.forgot-password');
    }

    public function resetIndex(){
        return view('buyer.auth.reset-password');
    }
}
