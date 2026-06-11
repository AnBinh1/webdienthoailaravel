<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Thêm tài khoản Admin
        // Kiểm tra xem đã có email admin@gmail.com chưa, nếu chưa mới thêm
        if (!DB::table('tbl_admin')->where('admin_email', 'admin@gmail.com')->exists()) {
            DB::table('tbl_admin')->insert([
                'admin_name'     => 'An binh',
                'admin_email'    => 'admin@gmail.com',
                'admin_password' => Hash::make('anbinh'), // Mật khẩu được mã hóa thành chuỗi an toàn
                'admin_phone'    => '0839453593',
                'created_at'     => now(),
                'updated_at'     => now()
            ]);
        }

        // 2. Thêm tài khoản User mặc định
        if (!User::where('email', 'test@example.com')->exists()) {
            User::create([
                'name'     => 'Test User',
                'email'    => 'test@example.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}