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
            // [
            //     'id'         => 1,
            //     'name'       => 'Danh mục',
            //     'desc_name'  => 'Danh mục',
            //     'parent_id'  => 0,
            //     'key_code'   => ''
            // ],
            // [
            //     'id'         => 2,
            //     'name'       => 'Danh sách danh mục',
            //     'desc_name'  => 'Danh sách danh mục',
            //     'parent_id'  => 1,
            //     'key_code'   => 'list_category'  
    
            // ],
            // [
            //     'id'         => 3,
            //     'name'       => 'Thêm danh mục',
            //     'desc_name'  => 'Thêm danh mục',
            //     'parent_id'  => 1,
            //     'key_code'   => 'add_category'  
            // ],
            // [
            //     'id'         => 4,
            //     'name'       => 'Sửa danh mục',
            //     'desc_name'  => 'Sửa danh mục',
            //     'parent_id'  => 1,
            //     'key_code'   => 'edit_category'  
            // ],
            // [
            //     'id'         => 5,
            //     'name'       => 'Xoá danh mục',
            //     'desc_name'  => 'Xoá danh mục',
            //     'parent_id'  => 1,
            //     'key_code'   => 'delete_category'  
            // ],
            // [
            //     'id'         => 6,
            //     'name'       => 'Sản phẩm',
            //     'desc_name'  => 'Sản phẩm',
            //     'parent_id'  => 0,
            //     'key_code'   => ''
            // ],
            // [
            //     'id'         => 7,
            //     'name'       => 'Danh sách sản phẩm',
            //     'desc_name'  => 'Danh sách sản phẩm',
            //     'parent_id'  => 6,
            //     'key_code'   => 'list_product'  
            // ],
            // [
            //     'id'         => 8,
            //     'name'       => 'Thêm sản phẩm',
            //     'desc_name'  => 'Thêm sản phẩm',
            //     'parent_id'  => 6,
            //     'key_code'   => 'add_product'  

            // ],
            // [
            //     'id'         => 9,
            //     'name'       => 'Sửa sản phẩm',
            //     'desc_name'  => 'Sửa Sản phẩm',
            //     'parent_id'  => 6,
            //     'key_code'   => 'edit_product'  

            // ],
            // [
            //     'id'         => 10,
            //     'name'       => 'Xoá sản phẩm',
            //     'desc_name'  => 'Xoá sản phẩm',
            //     'parent_id'  => 6,
            //     'key_code'   => 'delete_product'  

            // ],
            // [
            //     'id'         => 11,
            //     'name'       => 'Blog',
            //     'desc_name'  => 'Blog',
            //     'parent_id'  => 0,
            //     'key_code'   => ''
            // ],
            // [
            //     'id'         => 12,
            //     'name'       => 'Danh sách Blog',
            //     'desc_name'  => 'Danh sách Blog',
            //     'parent_id'  => 11,
            //     'key_code'   => 'list_blog'  

            // ],
            // [
            //     'id'         => 13,
            //     'name'       => 'Thêm Blog',
            //     'desc_name'  => 'Thêm Blog',
            //     'parent_id'  => 11,
            //     'key_code'   => 'add_blog'  
            // ],
            // [
            //     'id'         => 14,
            //     'name'       => 'Sửa Blog',
            //     'desc_name'  => 'Sửa Blog',
            //     'parent_id'  => 11,
            //     'key_code'   => 'edit_blog'  
            // ],
            // [
            //     'id'         => 15,
            //     'name'       => 'Xoá Blog',
            //     'desc_name'  => 'Xoá Blog',
            //     'parent_id'  => 11,
            //     'key_code'   => 'delete_blog'  
            // ],
            // [
            //     'id'         => 16,
            //     'name'       => 'Slider',
            //     'desc_name'  => 'Slider',
            //     'parent_id'  => 0,
            //     'key_code'   => ''
            // ],
            // [
            //     'id'         => 17,
            //     'name'       => 'Danh sách Slider',
            //     'desc_name'  => 'Danh sách Slider',
            //     'parent_id'  => 16,
            //     'key_code'   => 'list_slider'  
            // ],
            // [
            //     'id'         => 18,
            //     'name'       => 'Thêm Slider',
            //     'desc_name'  => 'Thêm Slider',
            //     'parent_id'  => 16,
            //     'key_code'   => 'add_slider'  

            // ],
            // [
            //     'id'         => 19,
            //     'name'       => 'Sửa Slider',
            //     'desc_name'  => 'Sửa Slider',
            //     'parent_id'  => 16,
            //     'key_code'   => 'edit_slider'  

            // ],
            // [
            //     'id'         => 20,
            //     'name'       => 'Xoá Slider',
            //     'desc_name'  => 'Xoá Slider',
            //     'parent_id'  => 16,
            //     'key_code'   => 'delete_slider'  

            // ],
            // [
            //     'id'         => 21,
            //     'name'       => 'Image',
            //     'desc_name'  => 'Image',
            //     'parent_id'  => 0,
            //     'key_code'   => ''
            // ],
            // [
            //     'id'         => 22,
            //     'name'       => 'Danh sách Image',
            //     'desc_name'  => 'Danh sách Image',
            //     'parent_id'  => 21,
            //     'key_code'   => 'list_image'  

            // ],
            // [
            //     'id'         => 23,
            //     'name'       => 'Thêm Image',
            //     'desc_name'  => 'Thêm Image',
            //     'parent_id'  => 21,
            //     'key_code'   => 'add_image'  

            // ],
            // [
            //     'id'         => 24,
            //     'name'       => 'Sửa Image',
            //     'desc_name'  => 'Sửa Image',
            //     'parent_id'  => 21,
            //     'key_code'   => 'edit_image'  

            // ],
            // [
            //     'id'         => 25,
            //     'name'       => 'Xoá Image',
            //     'desc_name'  => 'Xoá Image',
            //     'parent_id'  => 21,
            //     'key_code'   => 'delete_image'  

            // ],

            // [
            //     'id'         => 26,
            //     'name'       => 'Voucher',
            //     'desc_name'  => 'Voucher',
            //     'parent_id'  => 0,
            //     'key_code'   => ''
            // ],
            // [
            //     'id'         => 27,
            //     'name'       => 'Danh sách Voucher',
            //     'desc_name'  => 'Danh sách Voucher',
            //     'parent_id'  => 26,
            //     'key_code'   => 'list_voucher'  

            // ],
            // [
            //     'id'         => 28,
            //     'name'       => 'Thêm Voucher',
            //     'desc_name'  => 'Thêm Voucher',
            //     'parent_id'  => 26,
            //     'key_code'   => 'add_voucher'  

            // ],
            // [
            //     'id'         => 29,
            //     'name'       => 'Sửa Voucher',
            //     'desc_name'  => 'Sửa Voucher',
            //     'parent_id'  => 26,
            //     'key_code'   => 'edit_voucher'  

            // ],
            // [
            //     'id'         => 30,
            //     'name'       => 'Xoá Voucher',
            //     'desc_name'  => 'Xoá Voucher',
            //     'parent_id'  => 26,
            //     'key_code'   => 'delete_voucher'  

            // ],
            // [
            //     'id'         => 31,
            //     'name'       => 'User',
            //     'desc_name'  => 'User',
            //     'parent_id'  => 0,
            //     'key_code'   => ''
            // ],
            // [
            //     'id'         => 32,
            //     'name'       => 'Danh sách User',
            //     'desc_name'  => 'Danh sách User',
            //     'parent_id'  => 31,
            //     'key_code'   => 'list_user'  

            // ],
            // [
            //     'id'         => 33,
            //     'name'       => 'Thêm User',
            //     'desc_name'  => 'Thêm User',
            //     'parent_id'  => 31,
            //     'key_code'   => 'add_user'  

            // ],
            // [
            //     'id'         => 34,
            //     'name'       => 'Sửa User',
            //     'desc_name'  => 'Sửa User',
            //     'parent_id'  => 31,
            //     'key_code'   => 'edit_user'  

            // ],
            // [
            //     'id'         => 35,
            //     'name'       => 'Xoá User',
            //     'desc_name'  => 'Xoá User',
            //     'parent_id'  => 31,
            //     'key_code'   => 'delete_user'  

            // ],
            // [
            //     'id'         => 36,
            //     'name'       => 'Role',
            //     'desc_name'  => 'Role',
            //     'parent_id'  => 0,
            //     'key_code'   => ''
            // ],
            // [
            //     'id'         => 37,
            //     'name'       => 'Danh sách Role',
            //     'desc_name'  => 'Danh sách Role',
            //     'parent_id'  => 36,
            //     'key_code'   => 'list_role'  

            // ],
            // [
            //     'id'         => 38,
            //     'name'       => 'Thêm Role',
            //     'desc_name'  => 'Thêm Role',
            //     'parent_id'  => 36,
            //     'key_code'   => 'add_role'  

            // ],
            // [
            //     'id'         => 39,
            //     'name'       => 'Sửa Role',
            //     'desc_name'  => 'Sửa Role',
            //     'parent_id'  => 36,
            //     'key_code'   => 'edit_role'  

            // ],
            // [
            //     'id'         => 40,
            //     'name'       => 'Xoá Role',
            //     'desc_name'  => 'Xoá Role',
            //     'parent_id'  => 36,
            //     'key_code'   => 'delete_role'  

            // ],
            // [
            //     'id'         => 41,
            //     'name'       => 'Combo',
            //     'desc_name'  => 'Combo',
            //     'parent_id'  => 0,
            //     'key_code'   => ''
            // ],
            // [
            //     'id'         => 42,
            //     'name'       => 'Danh sách Combo',
            //     'desc_name'  => 'Danh sách Combo',
            //     'parent_id'  => 41,
            //     'key_code'   => 'list_combo'  

            // ],
            // [
            //     'id'         => 43,
            //     'name'       => 'Thêm Combo',
            //     'desc_name'  => 'Thêm Combo',
            //     'parent_id'  => 41,
            //     'key_code'   => 'add_combo'  

            // ],
            // [
            //     'id'         => 44,
            //     'name'       => 'Sửa Combo',
            //     'desc_name'  => 'Sửa Combo',
            //     'parent_id'  => 41,
            //     'key_code'   => 'edit_combo'  

            // ],
            // [
            //     'id'         => 45,
            //     'name'       => 'Xoá Combo',
            //     'desc_name'  => 'Xoá Combo',
            //     'parent_id'  => 41,
            //     'key_code'   => 'delete_combo'  

            // ],
            // [
            //     'id'         => 46,
            //     'name'       => 'Setting',
            //     'desc_name'  => 'Setting',
            //     'parent_id'  => 0,
            //     'key_code'   => ''
            // ],
            // [
            //     'id'         => 47,
            //     'name'       => 'Danh sách Setting',
            //     'desc_name'  => 'Danh sách Setting',
            //     'parent_id'  => 46,
            //     'key_code'   => 'list_setting'  

            // ],
            // [
            //     'id'         => 48,
            //     'name'       => 'Thêm Setting',
            //     'desc_name'  => 'Thêm Setting',
            //     'parent_id'  => 46,
            //     'key_code'   => 'add_setting'  

            // ],
            // [
            //     'id'         => 49,
            //     'name'       => 'Sửa Setting',
            //     'desc_name'  => 'Sửa Setting',
            //     'parent_id'  => 46,
            //     'key_code'   => 'edit_setting'  

            // ],
            // [
            //     'id'         => 50,
            //     'name'       => 'Xoá Setting',
            //     'desc_name'  => 'Xoá Setting',
            //     'parent_id'  => 46,
            //     'key_code'   => 'delete_setting'  

            // ],
            // [
            //     'id'         => 51,
            //     'name'       => 'Permission',
            //     'desc_name'  => 'Permission',
            //     'parent_id'  => 0,
            //     'key_code'   => ''
            // ],
            // [
            //     'id'         => 53,
            //     'name'       => 'Danh sách Permission',
            //     'desc_name'  => 'Danh sách Permission',
            //     'parent_id'  => 51,
            //     'key_code'   => 'list_permission'  

            // ],
            // [
            //     'id'         => 52,
            //     'name'       => 'Thêm Permission',
            //     'desc_name'  => 'Thêm Permission',
            //     'parent_id'  => 51,
            //     'key_code'   => 'add_permission'  

            // ],
            
            [
                // 'id'         => 53,
                'name'       => 'Customer',
                'desc_name'  => 'Customer',
                'parent_id'  => 0,
                'key_code'   => ''
            ],
            [
                // 'id'         => 54,
                'name'       => 'Danh sách Customer',
                'desc_name'  => 'Danh sách Customer',
                'parent_id'  => 53,
                'key_code'   => 'list_customer'
            ],
            [
                // 'id'         => 55,
                'name'       => 'Xoá Customer',
                'desc_name'  => 'Xoá Customer',
                'parent_id'  => 53,
                'key_code'   => 'delete_customer'
            ],
            [
                // 'id'         => 56,
                'name'       => 'Chi tiết Customer',
                'desc_name'  => 'Chi tiết Customer',
                'parent_id'  => 53,
                'key_code'   => 'detail_customer'
            ],
            [
                // 'id'         => 57,
                'name'       => 'Order',
                'desc_name'  => 'Order',
                'parent_id'  => 0,
                'key_code'   => ''
            ],
            [
                // 'id'         => 58,
                'name'       => 'Danh sách Order',
                'desc_name'  => 'Danh sách Order',
                'parent_id'  => 57,
                'key_code'   => 'list_order'  

            ],
            [
                // 'id'         => 59,
                'name'       => 'Chi tiết Order',
                'desc_name'  => 'Chi tiết Order',
                'parent_id'  => 57,
                'key_code'   => 'detail_order'  

            ],
            [
                // 'id'         => 60,
                'name'       => 'Sửa Order',
                'desc_name'  => 'Sửa Order',
                'parent_id'  => 57,
                'key_code'   => 'edit_order'  

            ],
            [
                // 'id'         => 61,
                'name'       => 'Setting',
                'desc_name'  => 'Setting',
                'parent_id'  => 0,
                'key_code'   => ''
            ],
            [
                // 'id'         => 62,
                'name'       => 'Danh sách Setting',
                'desc_name'  => 'Danh sách Setting',
                'parent_id'  => 61,
                'key_code'   => 'list_setting'  

            ],
            [
                // 'id'         => 63,
                'name'       => 'Thêm Setting',
                'desc_name'  => 'Thêm Setting',
                'parent_id'  => 64,
                'key_code'   => 'add_setting'  

            ],
            [
                // 'id'         => 64,
                'name'       => 'Sửa Setting',
                'desc_name'  => 'Sửa Setting',
                'parent_id'  => 61,
                'key_code'   => 'edit_setting'  

            ],
            [
                // 'id'         => 65,
                'name'       => 'Xoá Setting',
                'desc_name'  => 'Xoá Setting',
                'parent_id'  => 61,
                'key_code'   => 'delete_setting'  

            ],
            

            
            
        ];
        DB::table('permissions')->insert($data);
    }
}
