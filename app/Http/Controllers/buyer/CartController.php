<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
                    'quantity' => $cartItem->quantity,
                    'size' => $cartItem->size, // Assuming size is stored in the cart
                    'color' => $cartItem->color, // Assuming color is stored in the cart
                ];
            }
        }

        $totalPrice = collect($cartItemsWithDetails)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('buyer.cart', compact('cartItemsWithDetails', 'totalPrice'));
    }

    public function checkout(Request $request)
    {
        $user_id = $request->user_id;

        $cartItems = Cart::where('user_id', $user_id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('buyer.cart')->with('error', 'Your cart is empty.');
        }

        $orderTotal = 0;

        $order = Order::create([
            'user_id' => $user_id,
            'total_amount' => $orderTotal + 5, // Add shipping if needed
            'status' => 'Pending',
            'payment_method' => 'Cash on Delivery', // Assuming cash on delivery for simplicity
            'shipping_address' => 'Default Shipping Address', // Replace with actual address logic
        ]);

        foreach ($cartItems as $item) {
            $product = $item->product;

            if ($product) {
                $orderTotal += $product->price * $item->quantity;
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $item->quantity,
                    'price' => $product->price,
                    'total' => $product->price * $item->quantity,
                    'size' => $product->size, // Assuming size is stored in the product
                    'color' => $product->color, // Assuming color is stored in the product
                ])->save();
            }
        }

        // Update the order total
        $order->total_amount = $orderTotal + 5; // Add shipping if needed
        $order->save();

        // Clear the cart
        Cart::where('user_id', $user_id)->delete();

        return redirect()->route('buyer.cart')->with('success', 'Checkout successful! Your order has been placed.');
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
                'size' => $request->size, // Assuming size is passed in the request
                'color' => $request->color, // Assuming color is passed in the request
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

    public function reduceItemQuantity(Request $request, $id)
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
