<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->user_id;

        $cartItems = Cart::where('user_id', $user_id)->get();

        $cartItemsWithDetails = [];

        foreach ($cartItems as $cartItem) {

            $product = Product::find($cartItem->product_id);

            if ($product) {
                $category = Category::find($product->category_id);

                $cartItemsWithDetails[] = [
                    'id' => $product->id,
                    'image' => $product->image,
                    'name' => $product->name,
                    'category' => $category ? $category->name : 'Uncategorized',
                    'price' => $product->price,
                    'quantity' => $cartItem->quantity
                ];
            }
        }

        $totalPrice = collect($cartItemsWithDetails)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('buyer.cart', compact('cartItemsWithDetails', 'totalPrice'));
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
        return response()->json(['success' => 'successfully added to the cart']);
    }

    public function removeItemFromCart(Request $request, $id)
    {

        $user_id = $request->user_id;

        $cartItem = Cart::where('user_id', $user_id)
                        ->where('product_id', $id)
                        ->first();

        if (!$cartItem) {
            return response()->json([
                'message' => 'Product not found in your cart.',
            ], 404);
        }

        $cartItem->delete();

        return redirect()->route('buyer.cart');
    }

    public function reduceItemQuantity(Request $request,$id)
    {
        $user_id = $request->user_id;

        $cartItem = Cart::where('user_id', $user_id)
                        ->where('product_id', $id)
                        ->first();

        if (!$cartItem) {
            return response()->json([
                'message' => 'Product not found in your cart.',
            ], 404);
        }

        if ($cartItem->quantity > 1) {
            $cartItem->quantity -= 1;
            $cartItem->save();
        } else {
            $cartItem->delete();
        }
        return redirect()->route('buyer.cart');
    }

    public function increaseItemQuantity(Request $request, $id)
    {
        $user_id = $request->user_id;

        $cartItem = Cart::where('user_id', $user_id)
                        ->where('product_id', $id)
                        ->first();

        if (!$cartItem) {
            return response()->json([
                'message' => 'Product not found in your cart.',
            ], 404);
        }

        $cartItem->quantity += 1;
        $cartItem->save();
        return redirect()->route('buyer.cart');
    }

}
