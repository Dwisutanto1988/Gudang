<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShelfTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shelf')->delete();
        
        \DB::table('shelf')->insert(array (
            0 => 
            array (
                'shelf_id' => 7,
                'shelf_name' => 'Rak 1',
            ),
            1 => 
            array (
                'shelf_id' => 8,
                'shelf_name' => 'Rak 2',
            ),
            2 => 
            array (
                'shelf_id' => 9,
                'shelf_name' => 'Rak 3',
            ),
        ));
        
        
    }
}