<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductVariation;
use App\Models\Product;

class ProductVariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Manually define product variations
        $productVariations = [
            [
                'product_id' => 1, // Product ID for 'Men\'s Running Shoes'
                'size' => '10',
                'color' => 'Red',
                'price' => 54.99,
                'stock' => 15,
            ],
            [
                'product_id' => 1, // Product ID for 'Men\'s Running Shoes'
                'size' => '11',
                'color' => 'Blue',
                'price' => 54.99,
                'stock' => 20,
            ],
            [
                'product_id' => 2, // Product ID for 'Women\'s Casual Dress'
                'size' => 'S',
                'color' => 'Black',
                'price' => 59.99,
                'stock' => 10,
            ],
            [
                'product_id' => 2, // Product ID for 'Women\'s Casual Dress'
                'size' => 'M',
                'color' => 'Red',
                'price' => 59.99,
                'stock' => 12,
            ],
            [
                'product_id' => 3, // Product ID for 'Kids T-Shirt'
                'size' => 'L',
                'color' => 'Green',
                'price' => 14.99,
                'stock' => 30,
            ],
            [
                'product_id' => 3, // Product ID for 'Kids T-Shirt'
                'size' => 'M',
                'color' => 'Yellow',
                'price' => 12.99,
                'stock' => 25,
            ],
            [
                'product_id' => 4, // Product ID for 'Decorative Wall Clock'
                'size' => 'One Size',
                'color' => 'Gold',
                'price' => 29.99,
                'stock' => 10,
            ],
            [
                'product_id' => 4, // Product ID for 'Decorative Wall Clock'
                'size' => 'One Size',
                'color' => 'Silver',
                'price' => 29.99,
                'stock' => 8,
            ],
            [
                'product_id' => 5, // Product ID for 'Men\'s Winter Jacket'
                'size' => 'L',
                'color' => 'Navy',
                'price' => 99.99,
                'stock' => 5,
            ],
            [
                'product_id' => 5, // Product ID for 'Men\'s Winter Jacket'
                'size' => 'M',
                'color' => 'Black',
                'price' => 89.99,
                'stock' => 8,
            ],
            [
                'product_id' => 6, // Product ID for 'Women\'s Heels'
                'size' => '7',
                'color' => 'Black',
                'price' => 74.99,
                'stock' => 15,
            ],
            [
                'product_id' => 6, // Product ID for 'Women\'s Heels'
                'size' => '8',
                'color' => 'Red',
                'price' => 74.99,
                'stock' => 20,
            ],
            [
                'product_id' => 7, // Product ID for 'Kids Jeans'
                'size' => 'L',
                'color' => 'Blue',
                'price' => 24.99,
                'stock' => 25,
            ],
            [
                'product_id' => 7, // Product ID for 'Kids Jeans'
                'size' => 'M',
                'color' => 'Dark Blue',
                'price' => 22.99,
                'stock' => 30,
            ],
        ];

        // Insert each product variation into the database
        foreach ($productVariations as $variation) {
            ProductVariation::create($variation);
        }
    }
}
