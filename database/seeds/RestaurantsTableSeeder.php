<?php

use App\Restaurant;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for($i=0; $i<5; $i++){

            $newRestaurant = new Restaurant();

            $newRestaurant->name = $faker->word();
            $newRestaurant->address = $faker->address();
            $newRestaurant->phone = $faker->phoneNumber();
            $newRestaurant->email = $faker->email();
            $newRestaurant->vat = $faker->numberBetween(00000000001,99999999999);
            $newRestaurant->description = $faker->paragraph(2);
            $newRestaurant->user_id = $i+1;

            $newRestaurant->save();
        }

        // per tabella pivot con le typologies
        $records = Restaurant::all();

        for($i=0; $i<5; $i++){

            $n_typologies = rand(1,3);
            $typologies = [];
            for($j=0; $j<$n_typologies; $j++){
                $typologies[$j] = rand(1,10);
            }

            $records[$i]->typologies()->sync($typologies);
            $newRestaurant->save();
        }

    }
}
