<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function sellerSignUp() 
    {
        return view('auth.seller-signup');
    }

    public function buyerSignUp()
    {
        return view('auth.buyer-signup');
    }

    public function siginIn()
    {
        return view('auth.signin');
    }


    public function signOut()
    {
        return view('auth.signout');
    }

    public function defaultAuth()
    {
        return view('auth.auth');
    }
}
