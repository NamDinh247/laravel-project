<?php

use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        }
        \Illuminate\Support\Facades\DB::table('order_details')->truncate();
        \Illuminate\Support\Facades\DB::table('order_details')->insert([
            [
                'od_id' => 1,
                'product_id' => 31,
                'od_quantity' => 4,
                'od_unit_price' => 100000,
                'prd_sale_off' => 5,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s')
            ],
            [
                'od_id' => 2,
                'product_id' => 33,
                'od_quantity' => 1,
                'od_unit_price' => 1000000,
                'prd_sale_off' => 2,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s')
            ],
            [
                'od_id' => 3,
                'product_id' => 1,
                'od_quantity' => 4,
                'od_unit_price' => 250000,
                'prd_sale_off' => 0,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s')
            ],
            [
                'od_id' => 4,
                'product_id' => 1,
                'od_quantity' => 1,
                'od_unit_price' => 250000,
                'prd_sale_off' => 0,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s')
            ],
            [
                'od_id' => 5,
                'product_id' => 39,
                'od_quantity' => 2,
                'od_unit_price' => 200000,
                'prd_sale_off' => 10,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s')
            ],
            [
                'od_id' => 6,
                'product_id' => 12,
                'od_quantity' => 3,
                'od_unit_price' => 500000,
                'prd_sale_off' => 10,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s')
            ],
            [
                'od_id' => 7,
                'product_id' => 23,
                'od_quantity' => 1,
                'od_unit_price' => 250000,
                'prd_sale_off' => 10,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s')
            ],
            [
                'od_id' => 8,
                'product_id' => 11,
                'od_quantity' => 2,
                'od_unit_price' => 250000,
                'prd_sale_off' => 10,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s')
            ],
        ]);
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
