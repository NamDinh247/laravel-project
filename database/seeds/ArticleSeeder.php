<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
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
        \Illuminate\Support\Facades\DB::table('articles')->truncate();
        \Illuminate\Support\Facades\DB::table('articles')->insert([
            [
                'id' => 1,
                'shop_id' => 1,
                'product_id' => 3,
                'title' => 'Từ những bộ phần cũ trên xe đạp có thể tạo thành nhiều đồ vật mang tính thẩm mỹ cao',
                'detail' => 'Vành xe đạp tre trên trần nhà hoặc có thể gắn thêm cây trụ để biến nó thành móc treoi',
                'type' => 1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'shop_id' => 3,
                'product_id' => 11,
                'title' => 'Kệ giầy đơn giản cho ngôi nhà thân thương của bạn',
                'detail' => 'Giá để giày dép làm bằng gỗ pallet sẽ giúp bạn cất giữ được nhiều giáy dép hơn, đồng thời giúp giày dép luôn được thoáng khí.',
                'type' => 1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'shop_id' => 3,
                'product_id' => 13,
                'title' => 'Tranh treo tường làm bằng gỗ tái chế',
                'detail' => 'Ý tưởng sử pallet với nhiều mảnh nhỏ ghép thành một bức tranh treo tường không mới nhưng vẫn đủ sức cuốn hút với bất kỳ ai,
                 khi muốn tạo những mảng sắc màu đáng yêu và bắt mắt cho tường nhà.',
                'type' => 1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'shop_id' => 4,
                'product_id' => 16,
                'title' => 'Sự hữu ích của những que kem',
                'detail' => 'Sau khi ăn những que kem trong những ngày hè nóng bức ta có thể giữ lại những
                chiếc que để tạo ra những ngôi nhà thu nhỏ để làm trang trí trong phòng thật đặc biệt',
                'type' => 1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(5)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'shop_id' => 8,
                'product_id' => 27,
                'title' => 'Lọ Làm Bàng Nhựa Tái Chế',
                'detail' => 'Màu sắc rực rỡ phong phú tuyệt đẹp làm cho sản phẩm trở nên rất đặc biệt.
                Hoàn hỏa trang trí cho một căn phòng, đặc biết được làm từ 100% thủy tinh tái chế, mỗi mặt của đèn được làm bằng tay rất cầu kì.',
                'type' => 1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-10)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-10)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'shop_id' => 9,
                'product_id' => 17,
                'title' => 'Hộp Bút Làm Bằng Những Que Kem Tái Chế',
                'detail' => null,
                'type' => 1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'shop_id' => 9,
                'product_id' => 14,
                'title' => 'Bản Đồ Thế Giới Treo Tường Làm Bằng Gỗ',
                'detail' => null,
                'type' => 1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'shop_id' => 6,
                'product_id' => 18,
                'title' => 'Ghế Làm Từ Những Mảnh Gỗ Vụn',
                'detail' => null,
                'type' => 1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 9,
                'shop_id' => 5,
                'product_id' => 11,
                'title' => 'Kệ Giày Bằng Gỗ Pallet',
                'detail' => null,
                'type' => 1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 10,
                'shop_id' => 5,
                'product_id' => 10,
                'title' => 'Đĩa Làm Bằng Các Nắp Chai Bia',
                'detail' => null,
                'type' => 1,
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
