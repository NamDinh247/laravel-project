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
                'account_id' => 3,
                'shop_id' => 2,
                'od_code' => 'DH2008121',
                'od_total_price' => 400000,
                'ship_name' => 'Đỗ Mạnh Hùng',
                'ship_address' => '123 Cầu Giấy Hà Nội',
                'ship_email' => 'hungdm@gmail.com',
                'ship_phone' => '0987124124',
                'ship_fee' => 20000,
                'od_note' => 'Giao hàng giờ hành chính',
                'od_status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'account_id' => 5,
                'shop_id' => 2,
                'od_code' => 'DH2008122',
                'od_total_price' => 1000000,
                'ship_name' => 'Đỗ Mạnh Hùng',
                'ship_address' => '123 Quang Trung Hà Đông Hà Nội',
                'ship_email' => 'hungdm@gmail.com',
                'ship_phone' => '0987124432',
                'ship_fee' => 20000,
                'od_note' => 'Giao hàng giờ hành chính',
                'od_status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'account_id' => 3,
                'shop_id' => 1,
                'od_code' => 'DH2008123',
                'od_total_price' => 267500,
                'ship_name' => 'Đinh Thế Nam',
                'ship_address' => '123 Hoàng Quốc Việt, Hà Nội',
                'ship_email' => 'namdt@gmail.com',
                'ship_phone' => '0987124124',
                'ship_fee' => 20000,
                'od_note' => 'Giao hàng giờ hành chính',
                'od_status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'account_id' => 3,
                'shop_id' => 9,
                'od_code' => 'DH2009095',
                'od_total_price' => 69500,
                'ship_name' => 'Vũ Tuấn Anh',
                'ship_address' => '140 Hoàng Sâm, Hà Nội',
                'ship_email' => 'vutuananh@gmail.com',
                'ship_phone' => '0923124124',
                'ship_fee' => 20000,
                'od_note' => 'Giao hàng giờ hành chính',
                'od_status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'account_id' => 3,
                'shop_id' => 9,
                'od_code' => 'DH2009096',
                'od_total_price' => 218000,
                'ship_name' => 'Đinh Thế Nam',
                'ship_address' => '140 Duy Tân, Hà Nội',
                'ship_email' => 'namdt@gmail.com',
                'ship_phone' => '0923124123',
                'ship_fee' => 20000,
                'od_note' => 'Giao hàng giờ hành chính',
                'od_status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'account_id' => 3,
                'shop_id' => 3,
                'od_code' => 'DH2009097',
                'od_total_price' => 218000,
                'ship_name' => 'Mỹ Hảo',
                'ship_address' => '123 Duy Tân, Hà Nội',
                'ship_email' => 'haohao@gmail.com',
                'ship_phone' => '0923124196',
                'ship_fee' => 20000,
                'od_note' => 'Giao hàng giờ hành chính',
                'od_status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'account_id' => 3,
                'shop_id' => 3,
                'od_code' => 'DH2009097',
                'od_total_price' => 218000,
                'ship_name' => 'Mỹ Hảo',
                'ship_address' => '123 Duy Tân, Hà Nội',
                'ship_email' => 'haohao@gmail.com',
                'ship_phone' => '0923124196',
                'ship_fee' => 20000,
                'od_note' => 'Giao hàng giờ hành chính',
                'od_status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'account_id' => 3,
                'shop_id' => 3,
                'od_code' => 'DH2009098',
                'od_total_price' => 713000,
                'ship_name' => 'Phương Anh',
                'ship_address' => '123 Cầu Giấy, Hà Nội',
                'ship_email' => 'phuongan@gmail.com',
                'ship_phone' => '0923126789',
                'ship_fee' => 20000,
                'od_note' => 'Giao hàng giờ hành chính',
                'od_status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s')
            ],

        ]);
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
