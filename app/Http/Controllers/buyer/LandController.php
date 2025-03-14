<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class LandController extends Controller
{
    public function index(){
        $products =  Product::all();
        return view('buyer.home', compact('products'));
    }
}
