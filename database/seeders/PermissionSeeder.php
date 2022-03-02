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
                'id'         => 16,
                'name'       => 'Silders',
                'desc_name'  => 'Silders',
                'parent_id'  => 0
            ],
            [
                'id'         => 17,
                'name'       => 'Danh sách Silders',
                'desc_name'  => 'Danh sách Silders',
                'parent_id'  => 16
            ],
            [
                'id'         => 18,
                'name'       => 'Thêm Silders',
                'desc_name'  => 'Thêm Silders',
                'parent_id'  => 16
            ],
            [
                'id'         => 19,
                'name'       => 'Sửa Silders',
                'desc_name'  => 'Sửa Silders',
                'parent_id'  => 16
            ],
            [
                'id'         => 20,
                'name'       => 'Xoá Silders',
                'desc_name'  => 'Xoá Silders',
                'parent_id'  => 16
            ],
            [
                'id'         => 21,
                'name'       => 'Image',
                'desc_name'  => 'Image',
                'parent_id'  => 0
            ],
            [
                'id'         => 22,
                'name'       => 'Danh sách Image',
                'desc_name'  => 'Danh sách Image',
                'parent_id'  => 16
            ],
            [
                'id'         => 23,
                'name'       => 'Thêm Image',
                'desc_name'  => 'Thêm Image',
                'parent_id'  => 16
            ],
            [
                'id'         => 24,
                'name'       => 'Sửa Image',
                'desc_name'  => 'Sửa Image',
                'parent_id'  => 16
            ],
            [
                'id'         => 25,
                'name'       => 'Xoá Image',
                'desc_name'  => 'Xoá Image',
                'parent_id'  => 16
            ],
            [
                'id'         => 21,
                'name'       => 'Setting',
                'desc_name'  => 'Setting',
                'parent_id'  => 0
            ],
            [
                'id'         => 22,
                'name'       => 'Danh sách Setting',
                'desc_name'  => 'Danh sách Setting',
                'parent_id'  => 21
            ],
            [
                'id'         => 23,
                'name'       => 'Thêm Setting',
                'desc_name'  => 'Thêm Setting',
                'parent_id'  => 21
            ],
            [
                'id'         => 24,
                'name'       => 'Sửa Setting',
                'desc_name'  => 'Sửa Setting',
                'parent_id'  => 21
            ],
            [
                'id'         => 25,
                'name'       => 'Xoá Setting',
                'desc_name'  => 'Xoá Setting',
                'parent_id'  => 21
            ],
            [
                'id'         => 26,
                'name'       => 'Voucher',
                'desc_name'  => 'Voucher',
                'parent_id'  => 0
            ],
            [
                'id'         => 27,
                'name'       => 'Danh sách Voucher',
                'desc_name'  => 'Danh sách Voucher',
                'parent_id'  => 26
            ],
            [
                'id'         => 28,
                'name'       => 'Thêm Voucher',
                'desc_name'  => 'Thêm Voucher',
                'parent_id'  => 26
            ],
            [
                'id'         => 29,
                'name'       => 'Sửa Voucher',
                'desc_name'  => 'Sửa Voucher',
                'parent_id'  => 26
            ],
            [
                'id'         => 30,
                'name'       => 'Xoá Voucher',
                'desc_name'  => 'Xoá Voucher',
                'parent_id'  => 26
            ],
            [
                'id'         => 31,
                'name'       => 'User',
                'desc_name'  => 'User',
                'parent_id'  => 0
            ],
            [
                'id'         => 32,
                'name'       => 'Danh sách User',
                'desc_name'  => 'Danh sách User',
                'parent_id'  => 31
            ],
            [
                'id'         => 33,
                'name'       => 'Thêm User',
                'desc_name'  => 'Thêm User',
                'parent_id'  => 31
            ],
            [
                'id'         => 34,
                'name'       => 'Sửa User',
                'desc_name'  => 'Sửa User',
                'parent_id'  => 31
            ],
            [
                'id'         => 35,
                'name'       => 'Xoá User',
                'desc_name'  => 'Xoá User',
                'parent_id'  => 31
            ],
            [
                'id'         => 36,
                'name'       => 'Role',
                'desc_name'  => 'Role',
                'parent_id'  => 0
            ],
            [
                'id'         => 37,
                'name'       => 'Danh sách Role',
                'desc_name'  => 'Danh sách Role',
                'parent_id'  => 36
            ],
            [
                'id'         => 38,
                'name'       => 'Thêm Role',
                'desc_name'  => 'Thêm Role',
                'parent_id'  => 36
            ],
            [
                'id'         => 39,
                'name'       => 'Sửa Role',
                'desc_name'  => 'Sửa Role',
                'parent_id'  => 36
            ],
            [
                'id'         => 40,
                'name'       => 'Xoá Role',
                'desc_name'  => 'Xoá Role',
                'parent_id'  => 36
            ],
        ];
        DB::table('permissions')->insert($data);
    }
}
