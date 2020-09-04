<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
        \Illuminate\Support\Facades\DB::table('users')->truncate();
        \Illuminate\Support\Facades\DB::table('users')->insert([
            [
                'id' => 1,
                'user_name' => "superadmin",
                'email' => 'super_admin@gmail.com',
                'password' => bcrypt('123456'),
                'full_name' => 'Super Admin',
                'phone' => '0979111111',
                'role' => 1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'user_name' => "admin",
                'email' => 'admin@greenshop.com',
                'password' => bcrypt('123456'),
                'full_name' => 'Admin',
                'phone' => '0989222222',
                'role' => 2,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'user_name' => 'nam.dt247@gmail.com',
                'email' => 'nam.dt247@gmail.com',
                'password' => bcrypt('12121212'),
                'full_name' => 'Dinh The Nam',
                'phone' => '0962336610',
                'role' => 3,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'user_name' => 'anhvt@gmail.com',
                'email' => 'anhvt@gmail.com',
                'password' => bcrypt('123456'),
                'full_name' => 'Vu Tuan Anh',
                'phone' => '0987654321',
                'role' => 3,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'user_name' => 'hiennv@gmail.com',
                'email' => 'hiennv@gmail.com',
                'password' => bcrypt('123456'),
                'full_name' => 'Nguyen Van Hien',
                'phone' => '0987123456',
                'role' => 3,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'user_name' => 'thonh@gmail.com',
                'email' => 'thonh@gmail.com',
                'password' => bcrypt('123456'),
                'full_name' => 'Nguyen Huu Tho',
                'phone' => '0987123455',
                'role' => 3,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'user_name' => 'greenshop@gmail.com',
                'email' => 'greenshop@gmail.com',
                'password' => bcrypt('123456'),
                'full_name' => 'Green Shop',
                'phone' => '0979149742',
                'role' => 4,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'user_name' => 'shopxanh@gmail.com',
                'email' => 'shopxanh@gmail.com',
                'password' => bcrypt('123456'),
                'full_name' => 'Xanh Shop',
                'phone' => '0925329232',
                'role' => 4,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 9,
                'user_name' => 'shoptaiche@gmail.com',
                'email' => 'shoptaiche@gmail.com',
                'password' => bcrypt('123456'),
                'full_name' => 'Shop Tai Che',
                'phone' => '0979823712',
                'role' => 4,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 10,
                'user_name' => 'shopabc@gmail.com',
                'email' => 'shopabc@gmail.com',
                'password' => bcrypt('123456'),
                'full_name' => 'Xanh ABC',
                'phone' => '0925239123',
                'role' => 4,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 11,
                'user_name' => 'recycleshop@gmail.com',
                'email' => 'recycleshop@gmail.com',
                'password' => bcrypt('123456'),
                'full_name' => 'Recycle Shop',
                'phone' => '0355123123',
                'role' => 4,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 12,
                'user_name' => 'shopdotaiche@gmail.com',
                'email' => 'shopdotaiche@gmail.com',
                'password' => bcrypt('123456'),
                'full_name' => 'Do Tai Che Shop',
                'phone' => '0912386123',
                'role' => 4,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 13,
                'user_name' => 'shopglass@gmail.com',
                'email' => 'shopglass@gmail.com',
                'password' => bcrypt('123456'),
                'full_name' => 'Glass Recycle Shop',
                'phone' => '0971737112',
                'role' => 4,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 14,
                'user_name' => 'shopbrg@gmail.com',
                'email' => 'shopbrg@gmail.com',
                'password' => bcrypt('123456'),
                'full_name' => 'BRP Shop',
                'phone' => '0915321332',
                'role' => 4,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 15,
                'user_name' => 'shopfr@gmail.com',
                'email' => 'shopfr@gmail.com',
                'password' => bcrypt('123456'),
                'full_name' => 'Plastics recycle Shop',
                'phone' => '0925291232',
                'role' => 4,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 16,
                'user_name' => 'handmaderecycle@gmail.com',
                'email' => 'handmaderecycle@gmail.com',
                'password' => bcrypt('123456'),
                'full_name' => 'Handmade Recycle Shop',
                'phone' => '0927294832',
                'role' => 4,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 17,
                'user_name' => 'shophandmade@gmail.com',
                'email' => 'shophandmade@gmail.com',
                'password' => bcrypt('123456'),
                'full_name' => 'Handmade Here Shop',
                'phone' => '0913928982',
                'role' => 4,
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
