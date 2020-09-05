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
        ]);
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
