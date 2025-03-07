<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('buyer.products',compact('products'));
    }

    public function show($id)
    {
        $productforID = Product::where('id', $id)->first();
        $productVariations = ProductVariation::where('product_id', $id)->get();

        if (!$productforID) {
            return abort(404, 'Product not found');
        }

        // Get the first variation if available
        $firstVariation = $productVariations->first();

        $product = (object) [
            'title' => $productforID->name,
            'main_image' => "assets/images/{$productforID->image}",  // Correct string interpolation
            'rating' => 4.5,
            'orders_count' => $productforID->stock,
            'price' => $productforID->price,
            'description' => $productforID->description,
            'type' => $firstVariation ? $firstVariation->size : null,
            'color' => $firstVariation ? $firstVariation->color : null,
            'available_sizes' => $productVariations->pluck('size')->toArray(), // Extract sizes dynamically
        ];

        return view('buyer.product-view', compact('product'));

    }
}
