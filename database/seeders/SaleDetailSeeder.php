<?php

namespace Database\Seeders;

use App\Models\Sale_detail;
use Illuminate\Database\Seeder;

class SaleDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sale_detail::create([
            'quantity' => 2,
            'unit_price' => 999.99,
        ]);

        Sale_detail::create([
            'quantity' => 1,
            'unit_price' => 1999.99,
        ]);
    }
}
