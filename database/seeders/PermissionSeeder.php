<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
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
                'id'         => 1,
                'name'       => 'Danh mục',
                'desc_name'  => 'Danh mục',
                'parent_id'  => 0
            ],
            [
                'id'         => 2,
                'name'       => 'Danh sách danh mục',
                'desc_name'  => 'Danh sách danh mục',
                'parent_id'  => 1
            ],
            [
                'id'         => 3,
                'name'       => 'Thêm danh mục',
                'desc_name'  => 'Thêm danh mục',
                'parent_id'  => 1
            ],
            [
                'id'         => 4,
                'name'       => 'Sửa danh mục',
                'desc_name'  => 'Sửa danh mục',
                'parent_id'  => 1
            ],
            [
                'id'         => 5,
                'name'       => 'Xoá danh mục',
                'desc_name'  => 'Xoá danh mục',
                'parent_id'  => 1
            ],
            [
                'id'         => 6,
                'name'       => 'Sản phẩm',
                'desc_name'  => 'Sản phẩm',
                'parent_id'  => 0
            ],
            [
                'id'         => 7,
                'name'       => 'Danh sách sản phẩm',
                'desc_name'  => 'Danh sách sản phẩm',
                'parent_id'  => 6
            ],
            [
                'id'         => 8,
                'name'       => 'Thêm sản phẩm',
                'desc_name'  => 'Thêm sản phẩm',
                'parent_id'  => 6
            ],
            [
                'id'         => 9,
                'name'       => 'Sửa sản phẩm',
                'desc_name'  => 'Sửa Sản phẩm',
                'parent_id'  => 6
            ],
            [
                'id'         => 10,
                'name'       => 'Xoá sản phẩm',
                'desc_name'  => 'Xoá sản phẩm',
                'parent_id'  => 6
            ],
            [
                'id'         => 11,
                'name'       => 'Blog',
                'desc_name'  => 'Blog',
                'parent_id'  => 0
            ],
            [
                'id'         => 12,
                'name'       => 'Danh sách Blog',
                'desc_name'  => 'Danh sách Blog',
                'parent_id'  => 11
            ],
            [
                'id'         => 13,
                'name'       => 'Thêm Blog',
                'desc_name'  => 'Thêm Blog',
                'parent_id'  => 11
            ],
            [
                'id'         => 14,
                'name'       => 'Sửa Blog',
                'desc_name'  => 'Sửa Blog',
                'parent_id'  => 11
            ],
            [
                'id'         => 15,
                'name'       => 'Xoá Blog',
                'desc_name'  => 'Xoá Blog',
                'parent_id'  => 11
            ],
            [
                'id'         => 12,
                'name'       => 'Silders',
                'desc_name'  => 'Silders',
                'parent_id'  => 0
            ],
            [
                'id'         => 12,
                'name'       => 'Danh sách Silders',
                'desc_name'  => 'Danh sách Silders',
                'parent_id'  => 12
            ],
            [
                'id'         => 13,
                'name'       => 'Thêm Silders',
                'desc_name'  => 'Thêm Silders',
                'parent_id'  => 12
            ],
            [
                'id'         => 14,
                'name'       => 'Sửa Silders',
                'desc_name'  => 'Sửa Silders',
                'parent_id'  => 12
            ],
            [
                'id'         => 15,
                'name'       => 'Xoá Silders',
                'desc_name'  => 'Xoá Silders',
                'parent_id'  => 12
            ],
        ];
        DB::table('permissions')->insert($data);
    }
}
