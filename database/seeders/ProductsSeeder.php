<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
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
                'name' => 'Case Milk White',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/57553-mik-lv07-white-0004-1-1.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 1,
                'slug'      => 'Case-Milk-White'
            ],
            [
                'name' => 'Case Cooler',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/44566-case-cooler-master-cosmos-c700m-1.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 1,
                'slug'      => 'Case-Cooler'
            ],
            [
                'name' => 'Case Bolt Mini',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/bolt-mini-013.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 1,
                'slug'      => 'Case-Bolt-Mini'
            ],
            [
                'name' => 'Case 2',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/case2.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 1,
                'slug'      => 'Case-2'
            ],
            [
                'name' => 'Case Laze',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/gvn-h500p-d3718ec1782b4a939f398610ea79b06c.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 1,
                'slug'      => 'Case-Laze'
            ],
            [
                'name' => 'Case Luffy',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/Luffy.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 1,
                'slug'      => 'Case-Luffy'
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
            ],


            [
                'name' => 'Pan CPU cooler ',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/42168_tan_nhiet_cpu_cooler_master_masterair_620p_0001_1.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 2,
                'slug'      => 'Pan-CPU-cooler'
            ],
            [
                'name' => 'Pan CPU Noctua',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/1615570887-h710i-whiteblack-no-system-rear.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 2,
                'slug'      => 'Pan-CPU-Noctua'
            ],
            [
                'name' => 'Pan Evo ',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/53057_ek_vardar_evo_120er_d_rgb__500_2200_rpm__0001_1__5_.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 2,
                'slug'      => 'Pan-Evo'
            ],
            [
                'name' => 'Pan Jonsbo White',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/54828_jonsbo_cr_1000_white_0004_1__3_.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 2,
                'slug'      => 'Pan-Jonsbo-White'
            ],
            [
                'name' => 'Pan Master Hyper',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/57453_t___n_nhi___t_kh___cooler_master_hyper_212_argb_1.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 2,
                'slug'      => 'Pan-Master-Hyper'
            ],
            [
                'name' => 'Pan Trio',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/60057_id_cooling_trio_white__1_.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 2,
                'slug'      => 'Pan-Trio'
            ],
            [
                'name' => 'Pan Shadow',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/60326_jonsbo_shadow_240_argb__11_.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 2,
                'slug'      => 'Pan-Shadow'
            ],
            [
                'name' => 'Pan Arbg ',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/62250_aio_jonsbo_shadow_tw4_360__argb__white__6_.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 2,
                'slug'      => 'Pan-Arbg'
            ],

            [
                'name' => 'Pan Halo White ',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/mf140-halo-white-edition-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 2,
                'slug'      => 'Pan-Halo-White'
            ],
            [
                'name' => 'Pan Prismatic',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/masterfan-mf120-prismatic-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 2,
                'slug'      => 'Pan-Prismatic'
            ],
            [
                'name' => 'Pan Sickleflow',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/sickleflow-120-argb-3in1-gallery-1-zoom.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 2,
                'slug'      => 'Pan-Sickleflow'
            ],
            [
                'name' => 'Pan Masterfan Sf240p',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/masterfan-sf240p-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 2,
                'slug'      => 'Pan-Masterfan-Sf240p'
            ],
            [
                'name' => 'Pan Masterfan Mf120r',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/masterfan-mf120r-argb-3in1-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 2,
                'slug'      => 'Pan-Masterfan-Mf120r'
            ],




            [
                'name' => 'Power g500 ',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/g500-gold-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 5,
                'slug'      => 'Power-G500'
            ],
            [
                'name' => 'Power gx bronze 650',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/gx-bronze-650-gallery-1-2-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 5,
                'slug'      => 'Power-gx-bronze-650'
            ],
            [
                'name' => 'Power gx gold 1250',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/gx-gold-1250-v2-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 5,
                'slug'      => 'Power-gx-gold-1250'
            ],
            [
                'name' => 'Power hyber white 500',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/hyber-white-500-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 5,
                'slug'      => 'Power-hyber-white-500'
            ],
            [
                'name' => 'Power xg650 plus platinum',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/xg650-plus-platinum-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 5,
                'slug'      => 'Power-xg650-plus-platinum'
            ],
            [
                'name' => 'Power xg750 platinum ',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/xg750-platinum-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 5,
                'slug'      => 'Power-xg750-platinum'
            ],
            [
                'name' => 'Power xg750 plus platinum ',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/xg750-plus-platinum-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 5,
                'slug'      => 'Power-xg750-plus-platinum'
            ],
            [
                'name' => 'Power xg850 platinum ',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/xg850-platinum-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 5,
                'slug'      => 'Power-xg850-platinum'
            ],
            [
                'name' => 'Power xg850 plus platinum ',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/xg850-plus-platinum-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 5,
                'slug'      => 'Power-xg850-plus-platinum'
            ],
        ];
        DB::table('products')->insert($data);
    }
}
