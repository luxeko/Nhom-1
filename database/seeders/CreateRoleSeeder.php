<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'      => 'admin',
                'desc_name' => 'Quản trị hệ thống'
            ],
            [
                'name'      => 'guest',
                'desc_name' => 'Khách hàng'
            ],
            [
                'name'      => 'developer',
                'desc_name' => 'Phát triển hệ thống'
            ],
            [
                'name'      => 'content',
                'desc_name' => 'Chỉnh sửa nội dung'
            ],
                
        ];
        DB::table('roles')->insert($data);
    }
}
