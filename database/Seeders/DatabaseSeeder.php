<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     UsersTableSeeder::class
        // ]);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ShelfTableSeeder::class);
        $this->call(StockTableSeeder::class);
        $this->call(TujuansTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
