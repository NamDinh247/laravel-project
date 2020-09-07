<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
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
        \Illuminate\Support\Facades\DB::table('orders')->truncate();
        \Illuminate\Support\Facades\DB::table('orders')->insert([
            [
                'id' => 1,
                'account_id' => 2,
                'shop_id' => 2,
                'od_code' => 1,
                'od_total_price' => 400000,
                'ship_name' => 'Đỗ Mạnh Hùng',
                'ship_address' => '123 Cầu Giấy Hà Nội',
                'ship_email' => 'hungdm@gmail.com',
                'ship_phone' => 1203813921,
                'ship_fee' => 20000,
                'od_note' => 'Giao hàng giờ hành chính',
                'od_status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'account_id' => 1,
                'shop_id' => 2,
                'od_code' => 2,
                'od_total_price' => 1000000,
                'ship_name' => 'Đỗ Mạnh Hùng',
                'ship_address' => '123 Quang Trung Hà Đông Hà Nội',
                'ship_email' => 'hungdm@gmail.com',
                'ship_phone' => 9882908123,
                'ship_fee' => 20000,
                'od_note' => 'Giao hàng giờ hành chính',
                'od_status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays()->format('Y-m-d H:i:s')
            ],

        ]);
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
