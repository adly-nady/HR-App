<?php

namespace Database\Seeders;

use App\Models\product\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        product::create([
            'name_en' => 'product 1',
            'name_ar' => 'product 1',
            'price' => '100',
            'code' => '100',
            'image' => null,
            'desc_en' => 'product 1',
            'desc_ar'  => 'product 1',
            'quantity' => '100',
            'status'   => '1',
            'SubCategores' => '1',
            'Brands' => '1',
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);
    }
}
