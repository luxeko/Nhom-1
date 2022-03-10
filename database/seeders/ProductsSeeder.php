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
            // [
            //     'name' => 'Casa Coirsar',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/1615570887-h710i-whiteblack-no-system-rear.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 1,
            //     'slug'      => 'Casa-Coirsar'
            // ],
            // [
            //     'name' => 'Case Milk White',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/57553-mik-lv07-white-0004-1-1.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 1,
            //     'slug'      => 'Case-Milk-White'
            // ],
            // [
            //     'name' => 'Case Cooler',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/44566-case-cooler-master-cosmos-c700m-1.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 1,
            //     'slug'      => 'Case-Cooler'
            // ],
            // [
            //     'name' => 'Case Bolt Mini',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/bolt-mini-013.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 1,
            //     'slug'      => 'Case-Bolt-Mini'
            // ],
            // [
            //     'name' => 'Case 2',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/case2.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 1,
            //     'slug'      => 'Case-2'
            // ],
            // [
            //     'name' => 'Case Laze',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/gvn-h500p-d3718ec1782b4a939f398610ea79b06c.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 1,
            //     'slug'      => 'Case-Laze'
            // ],
            // [
            //     'name' => 'Case Luffy',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/Luffy.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 1,
            //     'slug'      => 'Case-Luffy'
            // ],
            // [
            //     'name' => 'Casa Coirsar',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/1615570887-h710i-whiteblack-no-system-rear.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 1,
            //     'slug'      => 'Casa-Coirsar'
            // ],


            // [
            //     'name' => 'Pan CPU cooler ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/42168_tan_nhiet_cpu_cooler_master_masterair_620p_0001_1.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-CPU-cooler'
            // ],
            // [
            //     'name' => 'Pan CPU Noctua',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/1615570887-h710i-whiteblack-no-system-rear.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-CPU-Noctua'
            // ],
            // [
            //     'name' => 'Pan Evo ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/53057_ek_vardar_evo_120er_d_rgb__500_2200_rpm__0001_1__5_.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Evo'
            // ],
            // [
            //     'name' => 'Pan Jonsbo White',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/54828_jonsbo_cr_1000_white_0004_1__3_.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Jonsbo-White'
            // ],
            // [
            //     'name' => 'Pan Master Hyper',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/57453_t___n_nhi___t_kh___cooler_master_hyper_212_argb_1.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Master-Hyper'
            // ],
            // [
            //     'name' => 'Pan Trio',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/60057_id_cooling_trio_white__1_.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Trio'
            // ],
            // [
            //     'name' => 'Pan Shadow',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/60326_jonsbo_shadow_240_argb__11_.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Shadow'
            // ],
            // [
            //     'name' => 'Pan Arbg ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/62250_aio_jonsbo_shadow_tw4_360__argb__white__6_.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Arbg'
            // ],

            // [
            //     'name' => 'Pan Halo White ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/mf140-halo-white-edition-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Halo-White'
            // ],
            // [
            //     'name' => 'Pan Prismatic',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/masterfan-mf120-prismatic-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Prismatic'
            // ],
            // [
            //     'name' => 'Pan Sickleflow',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/sickleflow-120-argb-3in1-gallery-1-zoom.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Sickleflow'
            // ],
            // [
            //     'name' => 'Pan Masterfan Sf240p',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/masterfan-sf240p-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Masterfan-Sf240p'
            // ],
            // [
            //     'name' => 'Pan Masterfan Mf120r',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/masterfan-mf120r-argb-3in1-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Masterfan-Mf120r'
            // ],




            // [
            //     'name' => 'Power g500 ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/g500-gold-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-G500'
            // ],
            // [
            //     'name' => 'Power gx bronze 650',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/gx-bronze-650-gallery-1-2-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-gx-bronze-650'
            // ],
            // [
            //     'name' => 'Power gx gold 1250',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/gx-gold-1250-v2-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-gx-gold-1250'
            // ],
            // [
            //     'name' => 'Power hyber white 500',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/hyber-white-500-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-hyber-white-500'
            // ],
            // [
            //     'name' => 'Power xg650 plus platinum',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/xg650-plus-platinum-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-xg650-plus-platinum'
            // ],
            // [
            //     'name' => 'Power xg750 platinum ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/xg750-platinum-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-xg750-platinum'
            // ],
            // [
            //     'name' => 'Power xg750 plus platinum ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/xg750-plus-platinum-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-xg750-plus-platinum'
            // ],
            // [
            //     'name' => 'Power xg850 platinum ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/xg850-platinum-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-xg850-platinum'
            // ],
            // [
            //     'name' => 'Power xg850 plus platinum ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/xg850-plus-platinum-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-xg850-plus-platinum'
            // ],
            // [
            //     'name' => 'Casa Coirsar',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/1615570887-h710i-whiteblack-no-system-rear.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 1,
            //     'slug'      => 'Casa-Coirsar'
            // ],
            // [
            //     'name' => 'Case Milk White',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/57553-mik-lv07-white-0004-1-1.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 1,
            //     'slug'      => 'Case-Milk-White'
            // ],
            // [
            //     'name' => 'Case Cooler',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/44566-case-cooler-master-cosmos-c700m-1.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 1,
            //     'slug'      => 'Case-Cooler'
            // ],
            // [
            //     'name' => 'Case Bolt Mini',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/bolt-mini-013.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 1,
            //     'slug'      => 'Case-Bolt-Mini'
            // ],
            // [
            //     'name' => 'Case 2',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/case2.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 1,
            //     'slug'      => 'Case-2'
            // ],
            // [
            //     'name' => 'Case Laze',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/gvn-h500p-d3718ec1782b4a939f398610ea79b06c.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 1,
            //     'slug'      => 'Case-Laze'
            // ],
            // [
            //     'name' => 'Case Luffy',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/Luffy.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 1,
            //     'slug'      => 'Case-Luffy'
            // ],
            // [
            //     'name' => 'Casa Coirsar',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/1615570887-h710i-whiteblack-no-system-rear.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 1,
            //     'slug'      => 'Casa-Coirsar'
            // ],










            // [
            //     'name' => 'Pan CPU cooler ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/42168_tan_nhiet_cpu_cooler_master_masterair_620p_0001_1.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-CPU-cooler'
            // ],
            // [
            //     'name' => 'Pan CPU Noctua',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/1615570887-h710i-whiteblack-no-system-rear.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-CPU-Noctua'
            // ],
            // [
            //     'name' => 'Pan Evo ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/53057_ek_vardar_evo_120er_d_rgb__500_2200_rpm__0001_1__5_.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Evo'
            // ],
            // [
            //     'name' => 'Pan Jonsbo White',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/54828_jonsbo_cr_1000_white_0004_1__3_.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Jonsbo-White'
            // ],
            // [
            //     'name' => 'Pan Master Hyper',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/57453_t___n_nhi___t_kh___cooler_master_hyper_212_argb_1.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Master-Hyper'
            // ],
            // [
            //     'name' => 'Pan Trio',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/60057_id_cooling_trio_white__1_.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Trio'
            // ],
            // [
            //     'name' => 'Pan Shadow',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/60326_jonsbo_shadow_240_argb__11_.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Shadow'
            // ],
            // [
            //     'name' => 'Pan Arbg ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/62250_aio_jonsbo_shadow_tw4_360__argb__white__6_.jpg',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Arbg'
            // ],

            // [
            //     'name' => 'Pan Halo White ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/mf140-halo-white-edition-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Halo-White'
            // ],
            // [
            //     'name' => 'Pan Prismatic',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/masterfan-mf120-prismatic-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Prismatic'
            // ],
            // [
            //     'name' => 'Pan Sickleflow',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/sickleflow-120-argb-3in1-gallery-1-zoom.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Sickleflow'
            // ],
            // [
            //     'name' => 'Pan Masterfan Sf240p',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/masterfan-sf240p-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Masterfan-Sf240p'
            // ],
            // [
            //     'name' => 'Pan Masterfan Mf120r',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/masterfan-mf120r-argb-3in1-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 2,
            //     'slug'      => 'Pan-Masterfan-Mf120r'
            // ],




            // [
            //     'name' => 'Power g500 ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/g500-gold-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-G500'
            // ],
            // [
            //     'name' => 'Power gx bronze 650',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/gx-bronze-650-gallery-1-2-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-gx-bronze-650'
            // ],
            // [
            //     'name' => 'Power gx gold 1250',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/gx-gold-1250-v2-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-gx-gold-1250'
            // ],
            // [
            //     'name' => 'Power hyber white 500',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/hyber-white-500-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-hyber-white-500'
            // ],
            // [
            //     'name' => 'Power xg650 plus platinum',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/xg650-plus-platinum-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-xg650-plus-platinum'
            // ],
            // [
            //     'name' => 'Power xg750 platinum ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/xg750-platinum-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-xg750-platinum'
            // ],
            // [
            //     'name' => 'Power xg750 plus platinum ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/xg750-plus-platinum-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-xg750-plus-platinum'
            // ],
            // [
            //     'name' => 'Power xg850 platinum ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/xg850-platinum-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-xg850-platinum'
            // ],
            // [
            //     'name' => 'Power xg850 plus platinum ',
            //     'content'  => '<p>Sarn pham moi </p>',
            //     'price'  => 1000000,
            //     'feature_image_path' => '/storage/product/1/xg850-plus-platinum-gallery-1-image.png',
            //     'status'   => 1,
            //     'user_id' => 1,
            //     'category_id' => 5,
            //     'slug'      => 'Power-xg850-plus-platinum'
            // ],
            [
                'name' => 'Chair caliberx1',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/01-cm_caliberx1_12_x1_front-pillow-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 10,
                'slug'      => 'Chair-caliberx1'
            ],
            [
                'name' => 'Chair cmcaliberr20',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/01-cmcaliberr20-ed1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 10,
                'slug'      => 'Chair-cmcaliberr20'
            ],
            [
                'name' => 'Chair caliber r1',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/caliber-r1-purples-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 10,
                'slug'      => 'Chair-caliber-r1'
            ],
            [
                'name' => 'Chair caliber r1s dark',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/caliber-r1s-dark-knight-camo-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 10,
                'slug'      => 'Chair-caliber-r1-dark'
            ],
            [
                'name' => 'Chair caliber r2c gallery',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/caliber-r2c-gallery-1-upd-image.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 10,
                'slug'      => 'Chair-caliber-r2c-gallery'
            ],
            [
                'name' => 'Chair caliber x1c gallery',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/caliber-x1c-gallery-1-upd-image.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 10,
                'slug'      => 'Chair-caliber-x1c-gallery'
            ],  
            [
                'name' => 'Chair caliber x1c rose',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/cariber-r1s-rose-white-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 10,
                'slug'      => 'Chair-caliber-x1c-rose'
            ],  
            [
                'name' => 'Chair ergo  gallery',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/cm-ergo-gallery-1-1-min-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 10,
                'slug'      => 'Chair-ergo-gallery'
            ],  
            [
                'name' => 'CPU Core I3',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 4399000,
                'feature_image_path' => '/storage/product/1/32917_i3.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 7,
                'slug'      => 'CPU-Core-I3'
            ],
            [
                'name' => 'CPU Core I5',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 5399000,
                'feature_image_path' => '/storage/product/1/32921_i5 (1).jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 7,
                'slug'      => 'CPU-Core-I5'
            ],
            [
                'name' => 'CPU Core I5',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 6399000,
                'feature_image_path' => '/storage/product/1/32921_i5.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 7,
                'slug'      => 'CPU-Core-I5'
            ],
            [
                'name' => 'CPU Core I7',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 7399000,
                'feature_image_path' => '/storage/product/1/32935_i7.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 7,
                'slug'      => 'CPU-Core-I5'
            ],
            [
                'name' => 'CPU Core I5 Gen 12',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 7499000,
                'feature_image_path' => '/storage/product/1/39584_km.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 7,
                'slug'      => 'CPU-Core-I5'
            ],
            [
                'name' => 'CPU Core I7 Gen 12',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 9499000,
                'feature_image_path' => '/storage/product/1/39589_z2887961155981_05c4ae0e792a1c2d6c8768378cbbcfb6.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 7,
                'slug'      => 'CPU-Core-I5'
            ],
            [
                'name' => 'CPU intel core i9',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 9499000,
                'feature_image_path' => '/storage/product/1/39593_61450_cpu_intel_core_i9_12900k_3_9ghz_turbo_up_to_5_2ghz_16_nhan_24_luong_30mb_cache_125w_socket_intel_lga_1700_alder_lake_1.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 7,
                'slug'      => 'CPU-intel-core-i9'
            ],
            [
                'name' => 'Keyboard Feature',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/feature-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 8,
                'slug'      => 'Keyboard-Feature'
            ],
            [
                'name' => 'Keyboard Edra',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/63894_ban_phim_edra_ek312_den_red_sw_usb_led_rainbow_0002_3.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 8,
                'slug'      => 'Keyboard-Edra'
            ],
            [
                'name' => 'Keyboard Dareu Ek807g',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/63921_ban_phim_co_khong_day_dareu_ek807g_trang_brown_sw_usb_0001_2.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 8,
                'slug'      => 'Keyboard-Dareu-Ek807g'
            ],
            [
                'name' => 'Keyboard Space Grey',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/ck721-space-grey-gallery-1-image.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 8,
                'slug'      => 'Keyboard-Space-Grey'
            ],
            [
                'name' => 'Keyboard mk110 mk110',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/mk110-mk110-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 8,
                'slug'      => 'Keyboard-mk110-mk110'
            ],
            [
                'name' => 'Keyboard razer huntsman',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/63912_ban_phim_razer_huntsman_v2_optical_clicky_purple_sw_rz03_03930300_r3m1_0001_2.jpg',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 8,
                'slug'      => 'Keyboard-razer-huntsman'
            ],
            [
                'name' => 'Keyboard ck550v2 gallery',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/ck550v2-gallery-1-0619-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 8,
                'slug'      => 'Keyboard-ck550v2-gallery'
            ],
            [
                'name' => 'Keyboard controlpad ',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/controlpad-gallery-v2-01-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 8,
                'slug'      => 'Keyboard-controlpad'
            ],
            [
                'name' => 'Keyboard gallery sk653 ',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/gallery-sk653-white-us-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 8,
                'slug'      => 'Keyboard-gallery-sk653'
            ],
            [
                'name' => 'Keyboard sk651 us ',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/sk651-us-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 8,
                'slug'      => 'Keyboard-sk651-us'
            ],
            [
                'name' => 'Mice cm110 01',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/cm110_01-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 9,
                'slug'      => 'Mice-cm110-01'
            ],
            [
                'name' => 'Mice mm531 001',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/mm531_001-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 9,
                'slug'      => 'Mice-mm531-001'
            ],
            [
                'name' => 'Mice mm710 black glossy',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/mm710-black-glossy-01-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 9,
                'slug'      => 'Mice-mm710-black-glossy'
            ],
            [
                'name' => 'Mice mm711 black matte',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/mm711-black-matte-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 9,
                'slug'      => 'Mice-mm711-black-matte'
            ],
            [
                'name' => 'Mice mm711 blue steel',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/mm711-blue-steel-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 9,
                'slug'      => 'Mice-mm711-blue-steel'
            ],
            [
                'name' => 'Mice mm711 gold gallery',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/mm711-gold-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 9,
                'slug'      => 'Mice-mm711-gold-gallery'
            ],
            [
                'name' => 'Mice mm711 retro gallery',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/mm711-retro-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 9,
                'slug'      => 'Mice-mm711-retro-gallery'
            ],
            [
                'name' => 'Mice mm720 black matte',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/mm720-black-matte-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 9,
                'slug'      => 'Mice-mm720-black-matte'
            ],
            [
                'name' => 'Mice mm830 gallery 001',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/mm830_gallery_001-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 9,
                'slug'      => 'Mice-mm830-gallery-001'
            ],
            [
                'name' => 'Mice mm831 gallery 1',
                'content'  => '<p>Sarn pham moi </p>',
                'price'  => 1000000,
                'feature_image_path' => '/storage/product/1/mm831-gallery-1-image.png',
                'status'   => 1,
                'user_id' => 1,
                'category_id' => 9,
                'slug'      => 'Mice-mm831-gallery-1'
            ],
        ];
        DB::table('products')->insert($data);
    }
}
