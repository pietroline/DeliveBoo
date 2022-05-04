<?php

use App\Order;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for($i=0; $i<20; $i++){
            
            $newFood = new Order();

            $newFood->name = $faker->name();
            $newFood->phone = $faker->phoneNumber();
            $newFood->address = $faker->address();
            $newFood->total = $faker->numberBetween(20, 100);
            $newFood->order_confirmed_date = $faker->dateTimeBetween("-5 week", "+0 week");
            $newFood->restaurant_id = $faker->numberBetween(1,5);

            $newFood->save();
        }

    }
}
