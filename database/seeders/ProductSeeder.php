<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'product_name' => 'iPhone',
            'description' => 'Latest iPhone model',
            'price' => 999.99,
        ]);

        Product::create([
            'product_name' => 'MacBook Pro',
            'description' => 'Powerful laptop for professionals',
            'price' => 1999.99,
        ]);
    }
}
