<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('buyer.cart');
    }

    public function addtocart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',  
            'quantity' => 'required|integer|min:1',         
        ]);

        $user = $request->user_id;

        $cartItem = Cart::where('user_id', $user)
                        ->where('product_id', $request->product_id)
                        ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity; 
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $user,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return response()->json([
            'success' => 'Product added to cart successfully!',
        ], 200);
    }
}
