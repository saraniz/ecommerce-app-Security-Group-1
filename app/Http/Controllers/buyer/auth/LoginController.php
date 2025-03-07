<?php

namespace App\Http\Controllers\buyer\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('buyer.auth.login');
    }

    public function login(){
        //
    }
}
