<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Shoes',
            'slug' => 'shoes',
            'description' => 'Various types of shoes for men, women, and kids.'
        ]);

        Category::create([
            'name' => 'Men Clothing',
            'slug' => 'men-clothing',
            'description' => 'Clothing and apparel for men including shirts, pants, and jackets.'
        ]);

        Category::create([
            'name' => 'Women Clothing',
            'slug' => 'women-clothing',
            'description' => 'Clothing and apparel for women including dresses, tops, and skirts.'
        ]);

        Category::create([
            'name' => 'Kids Clothing',
            'slug' => 'kids-clothing',
            'description' => 'Clothing and apparel for kids including t-shirts, pants, and dresses.'
        ]);

        Category::create([
            'name' => 'Decoration',
            'slug' => 'decoration',
            'description' => 'Home and office decoration items including furniture, wall hangings, and lights.'
        ]);
    }
}
