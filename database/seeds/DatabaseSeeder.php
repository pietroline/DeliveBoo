<?php

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

        // $this->call(UserSeeder::class);
        
        $this->call(CategoriesTableSeeder::class);
        $this->call(TypologiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RestaurantsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(FoodsTableSeeder::class);
        
        
    }
}
