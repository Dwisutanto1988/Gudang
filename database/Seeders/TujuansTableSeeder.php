<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TujuansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tujuans')->delete();
        
        \DB::table('tujuans')->insert(array (
            0 => 
            array (
                'id' => 6,
                'tujuan' => 'kesss',
                'created_at' => '2022-07-30 17:27:43',
                'updated_at' => '2022-07-30 18:02:43',
            ),
            1 => 
            array (
                'id' => 7,
                'tujuan' => 'ok',
                'created_at' => '2022-07-30 17:27:48',
                'updated_at' => '2022-07-30 17:57:35',
            ),
        ));
        
        
    }
}