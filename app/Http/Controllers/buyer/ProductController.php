<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('buyer.products');
    }

    public function show($id)
    {
        // Fetch the product by its ID
        $product = (object) [
            'title' => 'Quality Men\'s Hoodie for Winter, Men\'s Fashion Casual Hoodie',
            'main_image' => 'images/product/main_image.webp', // Path to the main product image
            'gallery_images' => [
                'images/product/image1.webp', // Additional gallery images
                'images/product/image2.webp',
                'images/product/image3.webp',
                'images/product/image4.webp',
            ],
            'rating' => 4.5, // Product rating out of 5
            'orders_count' => 154, // Number of orders
            'price' => 75.00, // Price per unit
            'description' => 'Modern look and quality hoodie for winter, featuring a stylish streetwear-inspired design. Made from high-quality cotton and perfect for everyday casual wear.',
            'type' => 'Regular', // Type of the product (e.g., regular, slim fit)
            'color' => 'Brown', // Product color
            'material' => 'Cotton, Jeans', // Material used for the product
            'brand' => 'Reebok', // Brand name
            'available_sizes' => ['Small', 'Medium', 'Large'], // Available sizes
        ];
        
        return view('buyer.product-view', compact('product'));
    }
}
