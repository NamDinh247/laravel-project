<?php

use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
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

        \Illuminate\Support\Facades\DB::table('order_statuses')->truncate();
        \Illuminate\Support\Facades\DB::table('order_statuses')->insert([
            [
                'id' => 1,
                'stt_name' => 'Đặt hàng thành công',
                'stt_nameAction' => 'Đặt hàng thành công',
                'stt_order' => 1,
            ],
            [
                'id' => 2,
                'stt_name' => 'Xác nhận',
                'stt_nameAction' => 'Xác nhận',
                'stt_order' => 2,
            ],
            [
                'id' => 3,
                'stt_name' => 'Đóng gói xong',
                'stt_nameAction' => 'Đóng gói xong',
                'stt_order' => 3,
            ],
            [
                'id' => 4,
                'stt_name' => 'Đang vận chuyển',
                'stt_nameAction' => 'Đang vận chuyển',
                'stt_order' => 4,
            ],
            [
                'id' => 5,
                'stt_name' => 'Hoàn thành',
                'stt_nameAction' => 'Hoàn thành',
                'stt_order' => 5,
            ],
            [
                'id' => 6,
                'stt_name' => 'Hủy',
                'stt_nameAction' => 'Hủy',
                'stt_order' => 6,
            ]
        ]);

        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
