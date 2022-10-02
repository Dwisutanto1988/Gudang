<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'desman@pardosi.net',
                'username' => 'admin',
                'role' => 0,
                'email_verified_at' => NULL,
                'password' => '$2y$10$Z3IPRUNAXHq0ks1hh4R0Quy2LmXmpzW7FIbXyTDptfLPLhM3uoxgS',
                'remember_token' => 'Ax72QnlBAHF0Vrfx2fXXXPePy9hzeR4CLmJRYSiKswSuG9vRmDcCZgPKuqzp',
                'created_at' => '2021-02-18 16:15:56',
                'updated_at' => '2021-02-18 16:15:56',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'syahrul',
                'email' => NULL,
                'username' => 'syahrul',
                'role' => 1,
                'email_verified_at' => NULL,
                'password' => '$2y$10$53VbWrWHj6ieLgZnjqKQou1n.smYnNZoJITJHZ.U6/RBFkR4xdPuS',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}