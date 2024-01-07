<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\InvoiceDetail;


class InvoiceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InvoiceDetail::insert(
            [
                [
                    // 'price_now' => 
                    // 'quantity' =>
                    // 'cur_date',
                    // 'product_id',
                    // 'invoice_id',
                    // 'created_at' => now(),
                    // 'updated_at' => now(),
                ],
            ]
        );
    }
}
