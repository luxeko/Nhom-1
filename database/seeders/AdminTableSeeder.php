<?php

use Illuminate\Database\Seeder;

class addProductTable extends Seeder{

    public function dataProduct(){
        $product = [
            [
                'name' => 'Casa Coirsar',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/1615570887-h710i-whiteblack-no-system-rear.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 1,
                'slug'      => 'Casa-Coirsar'
            ],
            [
                'name' => 'Casa Coirsar',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/1615570887-h710i-whiteblack-no-system-rear.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 1,
                'slug'      => 'Casa-Coirsar'
            ]



        ];

        $blogs = [
            'content_post'  => '<p>asdasdasdasdasdda</p>',
            'title'         => 'Mieu ta',
            'image' => '/storage/product/1/1615570887-h710i-whiteblack-no-system-rear.png',
            'status'   => 1,
            'author'    => 'nhom 1',
        ];
    }
}