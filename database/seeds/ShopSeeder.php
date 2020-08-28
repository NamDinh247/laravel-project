<?php

use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
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
        \Illuminate\Support\Facades\DB::table('shops')->truncate();
        \Illuminate\Support\Facades\DB::table('shops')->insert([
            [
                'id' => 1,
                'account_id' => 2,
                'name' => 'Bán đồ tái chế',
                'logo' => '',
                'address' => '223 Láng Hạ, Đống Đa, Hà Nội',
                'email' => 'dotaiche1102@gmail.com',
                'phone' => '0123128181',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'account_id' => 3,
                'name' => 'Đồ tái chế handmade',
                'logo' => '',
                'address' => '123 Xuân Thụy, Cầu Giấy, Hà Nội',
                'email' => 'dungvqdtc@gmail.com',
                'phone' => 123128181,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'account_id' => 4,
                'name' => 'Green shop',
                'logo' => '',
                'address' => '231 Cầu Giấy, Hà Nội',
                'email' => 'greenshop@gmail.com',
                'phone' => 991723121,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays()->format('Y-m-d H:i:s')
            ],

        ]);
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
