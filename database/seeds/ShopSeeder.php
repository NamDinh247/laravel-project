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
                'logo' => 'g6hnhg779tgwp0u36wht',
                'address' => '223 Láng Hạ, Đống Đa, Hà Nội',
                'email' => 'dotaiche1102@gmail.com',
                'phone' => '0123128181',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'account_id' => 3,
                'name' => 'Đồ tái chế handmade',
                'logo' => 'zdl4vr7d4nnxqpnvm6ot',
                'address' => '123 Xuân Thụy, Cầu Giấy, Hà Nội',
                'email' => 'dungvqdtc@gmail.com',
                'phone' => '123128181',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'account_id' => 4,
                'name' => 'Green shop',
                'logo' => 'evpysvnlhkvwtjuofhu1',
                'address' => '231 Cầu Giấy, Hà Nội',
                'email' => 'greenshop@gmail.com',
                'phone' => '991723121',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'account_id' => 8,
                'name' => 'Xanh Shop',
                'logo' => 'zsst9iyoan7g9vg7aq1j',
                'address' => '153 Cầu Giấy, Hà Nội',
                'email' => 'shopxanh@gmail.com',
                'phone' => '0925329232',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'account_id' => 9,
                'name' => 'Shop Tai Che',
                'logo' => 'nystevzoffh5wwzitvcc',
                'address' => '198 Đội Cấn, Ba Đình, Hà Nội',
                'email' => 'shoptaiche@gmail.com',
                'phone' => '0979823712',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'account_id' => 10,
                'name' => 'Xanh ABC',
                'logo' => 'q2hy57xhy8tlszkwcflu',
                'address' => '198 Đội Cấn, Ba Đình, Hà Nội',
                'email' => 'shopabc@gmail.com',
                'phone' => '0925239123',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'account_id' => 11,
                'name' => 'Recycle Shop',
                'logo' => 'ghgmpxfrewcfcczrulja',
                'address' => '192 Nguyễn Trãi, Thanh Xuân, Hà Nội',
                'email' => 'recycleshop@gmail.com',
                'phone' => '0355123123',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'account_id' => 12,
                'name' => 'Do Tai Che Shop',
                'logo' => 'q4po69nf2uq0ffra1qib',
                'address' => '81 Cửa Bắc, Ba Đình, Hà Nội',
                'email' => 'shopdotaiche@gmail.com',
                'phone' => '0912386123',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 9,
                'account_id' => 13,
                'name' => 'Glass Recycle Shop',
                'logo' => 'lazphkyjqtyyfho6cbrv',
                'address' =>'123 Quang Trung, Hà Đông, Hà Nội',
                'email' => 'shopglass@gmail.com',
                'phone' => '0971737112',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 10,
                'account_id' => 14,
                'name' => 'BRP Shop',
                'logo' => 'xvxtxknmvc38gbkegfrk',
                'address' =>'08A Mỹ Đình, Hà Nội',
                'email' => 'shopbrg@gmail.com',
                'phone' => '0915321332',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 11,
                'account_id' => 15,
                'name' => 'Plastics recycle Shop',
                'logo' => 'evpysvnlhkvwtjuofhu1',
                'address' =>'187 Tố Hữu, Hà Nội',
                'email' => 'shopfr@gmail.com',
                'phone' => '0925291232',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 12,
                'account_id' => 16,
                'name' => 'Handmade Recycle Shop',
                'logo' => 'zdl4vr7d4nnxqpnvm6ot',
                'address' =>'182 Lương Thế Vinh, Trung Văn, Hà Nội',
                'email' => 'handmaderecycle@gmail.com',
                'phone' => '0927294832',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 13,
                'account_id' => 17,
                'name' => 'Handmade Here Shop',
                'logo' => 'g6hnhg779tgwp0u36wht',
                'address' =>'82 Lương Thế Vinh, Trung Văn, Hà Nội',
                'email' => 'shophandmade@gmail.com',
                'phone' => '0913928982',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],

        ]);
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
