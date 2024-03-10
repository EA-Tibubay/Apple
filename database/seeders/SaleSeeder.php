<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sale::create([
            'sale_date' => now(),
            'total_amount' => 2999.97,
            'payment_method' => 'credit_card',
            'product_id' => 1, // Adjust based on your product IDs
            'sale_details_id' => 1, // Adjust based on your sale details IDs
        ]);
    }
}
