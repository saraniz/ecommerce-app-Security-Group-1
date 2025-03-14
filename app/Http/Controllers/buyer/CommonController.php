<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function aboutIndex(){
        return view('buyer.about');
    }

    public function contactIndex(){
        return view('buyer.contact');
    }
}
