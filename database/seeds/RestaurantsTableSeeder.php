<?php

use App\Restaurant;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for($i=0; $i<20; $i++){
            
            $newRestaurant = new Restaurant();

            $newRestaurant->name = ucfirst($faker->word());


            // creazione slug, verifica se già esistente e crea slug univoco su DB
            $newRestaurant->slug = Str::slug($newRestaurant->name);
            $counter = 1;
            while (Restaurant::where('slug', $newRestaurant->slug)->first()) {
                $newRestaurant->slug = Str::slug($newRestaurant->name) . '-' . $counter;
                $counter++;
            }
            
            
            $newRestaurant->address = $faker->address();
            $newRestaurant->phone = $faker->phoneNumber();
            $newRestaurant->email = $faker->email();
            $newRestaurant->vat = $faker->numberBetween(10000000000,99999999999);
            $newRestaurant->description = $faker->paragraph(2);
            $newRestaurant->user_id = $i+1;

            $newRestaurant->save();
        }

        // per tabella pivot con le typologies
        $records = Restaurant::all();

        for($i=0; $i<20; $i++){

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
