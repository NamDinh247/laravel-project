<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
        \Illuminate\Support\Facades\DB::table('categories')->truncate();
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Kim loại',
                'status' => 1,
                'note' => 'Các sản phầm có nguồn gỗc từ kim loại.',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'name' => 'Gỗ',
                'note' => 'Các sản phẩm có nguồn gỗc từ gỗ.',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'name' => 'Nhựa, cao su',
                'note' => 'Các sản phẩm có nguồn gỗc từ nhựa, cao su.',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'name' => 'Thủy tinh',
                'note' => 'Các sản phẩm có nguồn gỗc từ thủy tinh.',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'name' => 'Khác',
                'note' => 'Các sản phẩm từ các chất liệu khác, như vải,...',
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s')
            ],

        ]);
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
