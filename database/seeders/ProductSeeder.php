<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Men\'s Running Shoes',
                'description' => 'High-quality running shoes for men.',
                'price' => 49.99,
                'quantity' => 30,
                'status' => 'active',  // Changed to 'active'
                'image' => 'product_01.jpg',
                'category_id' => 1, // Assuming 1 is for 'Shoes'
            ],
            [
                'name' => 'Women\'s Casual Dress',
                'description' => 'A beautiful casual dress for women.',
                'price' => 59.99,
                'quantity' => 20,
                'status' => 'active',  // Changed to 'active'
                'image' => 'product_02.jpg',
                'category_id' => 2, // Assuming 2 is for 'Women Clothing'
            ],
            [
                'name' => 'Kids T-Shirt',
                'description' => 'Comfortable cotton t-shirt for kids.',
                'price' => 12.99,
                'quantity' => 50,
                'status' => 'active',  // Changed to 'active'
                'image' => 'product_03.jpg',
                'category_id' => 3, // Assuming 3 is for 'Kids Clothing'
            ],
            [
                'name' => 'Decorative Wall Clock',
                'description' => 'A stylish wall clock to decorate your home.',
                'price' => 25.99,
                'quantity' => 15,
                'status' => 'active',  // Changed to 'active'
                'image' => 'product_04.jpg',
                'category_id' => 4, // Assuming 4 is for 'Decoration'
            ],
            [
                'name' => 'Men\'s Winter Jacket',
                'description' => 'A warm and stylish jacket for men.',
                'price' => 89.99,
                'quantity' => 10,
                'status' => 'active',  // Changed to 'active'
                'image' => 'product_05.jpg',
                'category_id' => 2, // Assuming 2 is for 'Men Clothing'
            ],
            [
                'name' => 'Women\'s Heels',
                'description' => 'Elegant heels for women.',
                'price' => 74.99,
                'quantity' => 40,
                'status' => 'active',  // Changed to 'active'
                'image' => 'product_06.jpg',
                'category_id' => 1, // Assuming 1 is for 'Shoes'
            ],
            [
                'name' => 'Kids Jeans',
                'description' => 'Durable and stylish jeans for kids.',
                'price' => 19.99,
                'quantity' => 60,
                'status' => 'active',  // Changed to 'active'
                'image' => 'product_07.jpg',
                'category_id' => 3, // Assuming 3 is for 'Kids Clothing'
            ],
            [
                'name' => 'Men\'s Hoodie',
                'description' => 'Comfortable hoodie for men.',
                'price' => 39.99,
                'quantity' => 25,
                'status' => 'active',  // Changed to 'active'
                'image' => 'product_08.jpg',
                'category_id' => 2, // Assuming 2 is for 'Men Clothing'
            ],
            [
                'name' => 'Women\'s Sunglasses',
                'description' => 'Stylish sunglasses for women.',
                'price' => 29.99,
                'quantity' => 100,
                'status' => 'active',  // Changed to 'active'
                'image' => 'product_09.jpg',
                'category_id' => 2, // Assuming 2 is for 'Women Clothing'
            ],
            [
                'name' => 'Kids Shoes',
                'description' => 'Comfortable shoes for kids.',
                'price' => 29.99,
                'quantity' => 50,
                'status' => 'active',  // Changed to 'active'
                'image' => 'product_10.jpg',
                'category_id' => 1, // Assuming 1 is for 'Shoes'
            ],
            [
                'name' => 'Men\'s Formal Shirt',
                'description' => 'Elegant formal shirt for men.',
                'price' => 39.99,
                'quantity' => 30,
                'status' => 'active',  // Changed to 'active'
                'image' => 'product_11.jpg',
                'category_id' => 2, // Assuming 2 is for 'Men Clothing'
            ],
            [
                'name' => 'Women\'s Summer Dress',
                'description' => 'A light and airy summer dress for women.',
                'price' => 49.99,
                'quantity' => 25,
                'status' => 'active',  // Changed to 'active'
                'image' => 'product_12.jpg',
                'category_id' => 2, // Assuming 2 is for 'Women Clothing'
            ],
            [
                'name' => 'Kids Sweatshirt',
                'description' => 'Cozy sweatshirt for kids.',
                'price' => 19.99,
                'quantity' => 40,
                'status' => 'active',  // Changed to 'active'
                'image' => 'product_13.jpg',
                'category_id' => 3, // Assuming 3 is for 'Kids Clothing'
            ],
            [
                'name' => 'Decorative Throw Blanket',
                'description' => 'Soft throw blanket to add comfort and style.',
                'price' => 34.99,
                'quantity' => 15,
                'status' => 'active',  // Changed to 'active'
                'image' => 'product_14.jpg',
                'category_id' => 4, // Assuming 4 is for 'Decoration'
            ]
        ];

        // Insert each product into the database
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
