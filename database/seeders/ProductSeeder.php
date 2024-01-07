<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert(
            [
                [
                    'product_name' => 'ô ma chi',
                    'unit' => 'gram',
                    'price' => 8000,
                    'weight_product' => 180,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'product_name' => 'bánh mì sandwich',
                    'unit' => 'gram',
                    'price' => 15000,
                    'weight_product' => 50,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'product_name' => 'sữa milo',
                    'unit' => 'ml',
                    'price' => 8000,
                    'weight_product' => 180,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'product_name' => 'xà phòng',
                    'unit' => 'gram',
                    'price' => 35000,
                    'weight_product' => 1000,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'product_name' => 'kem đánh răng',
                    'unit' => 'tuýp',
                    'price' => 100000,
                    'weight_product' => 100,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'product_name' => 'nước C2',
                    'unit' => 'ml',
                    'price' => 10000,
                    'weight_product' => 230,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'product_name' => 'mì thanh long',
                    'unit' => 'gram',
                    'price' => 45000,
                    'weight_product' => 250,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'product_name' => 'sữa rửa mặt',
                    'unit' => 'lọ',
                    'price' => 200000,
                    'weight_product' => 350,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'product_name' => 'kính râm',
                    'unit' => 'chiếc',
                    'price' => 100000,
                    'weight_product' => 50,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'product_name' => 'bút chì',
                    'unit' => 'chiếc',
                    'price' => 5000,
                    'weight_product' => 30,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'product_name' => 'nước lọc',
                    'unit' => 'ml',
                    'price' => 5000,
                    'weight_product' => 150,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'product_name' => 'cà phê',
                    'unit' => 'gram',
                    'price' => 3000,
                    'weight_product' => 30,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'product_name' => 'trà đào',
                    'unit' => 'ml',
                    'price' => 10000,
                    'weight_product' => 200,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'product_name' => 'bóng đèn',
                    'unit' => 'cái',
                    'price' => 50000,
                    'weight_product' => 50,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

            ]
        );
    }
}
