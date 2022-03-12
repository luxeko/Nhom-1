<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
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
                'name' => 'Case',
                'desc_name' => 'Case',
                'status'=> 1,
            ],
            [
                'name' => 'Fan',
                'desc_name' => 'Fan',
                'status'=> 1,
            ],
    
            [
                'name' => 'Cooling',
                'desc_name' => 'Case',
                'status'=> 1,
            ],
            [
                'name' => 'Motherboards',
                'desc_name' => 'Case',
                'status'=> 1,
            ],
            [
                'name' => 'Power',
                'desc_name' => 'Case',
                'status'=> 1,
            ],
            [
                'name' => 'Lighting',
                'desc_name' => 'Case',
                'status'=> 1,
            ],
            [
                'name' => 'CPU',
                'desc_name' => 'Case',
                'status'=> 1,
            ],
        ];
        DB::table('categories')->insert($data);
    }
}
