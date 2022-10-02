<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'product_id' => 7,
                'user_id' => 1,
                'product_code' => 8999908009203,
                'product_name' => 'CLAUDIA BEAUTY HIJAU 80G',
                'purchase_price' => '2000.00',
                'sale_price' => '3000.00',
                'category_id' => 5,
                'tujuan_id' => 0,
            ),
            1 => 
            array (
                'product_id' => 8,
                'user_id' => 1,
                'product_code' => 8999908009204,
                'product_name' => 'CLAUDIA BEAUTY HIJAU 90G',
                'purchase_price' => '5000.00',
                'sale_price' => '6000.00',
                'category_id' => 5,
                'tujuan_id' => 0,
            ),
            2 => 
            array (
                'product_id' => 12,
                'user_id' => 1,
                'product_code' => 8999908009206,
                'product_name' => 'TES PRODUK 2',
                'purchase_price' => '2000.00',
                'sale_price' => '3000.00',
                'category_id' => 1,
                'tujuan_id' => 0,
            ),
            3 => 
            array (
                'product_id' => 13,
                'user_id' => 5,
                'product_code' => 8999908009205,
                'product_name' => 'TES PRODUK',
                'purchase_price' => '2000.00',
                'sale_price' => '3000.00',
                'category_id' => 7,
                'tujuan_id' => 0,
            ),
        ));
        
        
    }
}