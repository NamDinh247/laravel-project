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
                'created_at' => \Illuminate\Support\Carbon::now()->addDays()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays()->format('Y-m-d H:i:s')
            ],
            [
                'od_id' => 2,
                'product_id' => 33,
                'od_quantity' => 1,
                'od_unit_price' => 1000000,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays()->format('Y-m-d H:i:s')
            ],
        ]);
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
