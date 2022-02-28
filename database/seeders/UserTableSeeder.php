<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
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
                'user_name' => 'admin',
                'password' => bcrypt('admin'),
                'full_name'=> 'Duc Anh',
                'telephone' => '012345678'
            ],
            [
                'user_name' => 'admin2',
                'password' => bcrypt('admin2'),
                'full_name'=> 'Test',
                'telephone' => '0125454678'
            ],
            [
                'user_name' => 'admin3',
                'password' => bcrypt('admin3'),
                'full_name'=> 'Test3',
                'telephone' => '91946555'
            ],
        ];
        DB::table('users')->insert($data);
    }
}
