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

        $restaurants = [
            [
                "name" => "alGazebo",
                "typologies" => [6, 10],
                "path" => "alGazebo-vegano.png"
            ],
            [
                "name" => "amarJakal",
                "typologies" => [4, 5],
                "path" => "amarJakadal-indiano.png"
            ],
            [
                "name" => "Cadde Burger",
                "typologies" => [9],
                "path" => "caddeBurger-streetfood.png"
            ],
            [
                "name" => "Casa del Ramen",
                "typologies" => [3, 1],
                "path" => "casaDelRamen-giapponese.png"
            ],
            [
                "name" => "Da Vittorio",
                "typologies" => [6, 8, 10],
                "path" => "daVittorio-italiano.png"
            ],
            [
                "name" => "Dolci delizie",
                "typologies" => [2, 10],
                "path" => "dolciDelizie-gelateria.png"
            ],
            [
                "name" => "donPacho",
                "typologies" => [7, 5],
                "path" => "donPacho-messicano.png"
            ],
            [
                "name" => "Hot spot",
                "typologies" => [5],
                "path" => "hotSpot-internazionale.png"
            ],
            [
                "name" => "Lanterna Rossa",
                "typologies" => [1, 8],
                "path" => "lanternaRossa-cinese.png"
            ],
            [
                "name" => "LeafinGreen",
                "typologies" => [10, 10],
                "path" => "leafinGreen-vegano.png"
            ],
            [
                "name" => "Mashed Potato",
                "typologies" => [9],
                "path" => "mashedPotato-streetfood.png"
            ],
            [
                "name" => "Milkosa",
                "typologies" => [2],
                "path" => "milkosa-gelateria.png"
            ],
            [
                "name" => "Paradiso degli Hamb",
                "typologies" => [9],
                "path" => "paradisoDegliHamb-streetfood.png"
            ],
            [
                "name" => "Pizza Slice",
                "typologies" => [8, 6],
                "path" => "pizzaSlice-pizzeria.png"
            ],
            [
                "name" => "SpicyPizza",
                "typologies" => [8, 9],
                "path" => "spicyPizza-pizzeria.png"
            ],
            [
                "name" => "Sushi brand",
                "typologies" => [3, 5],
                "path" => "sushibrand-giapponese.png"
            ],
            [
                "name" => "TacoBill",
                "typologies" => [7],
                "path" => "tacoBill-messicano.png"

            ],
            [
                "name" => "Toekbokki",
                "typologies" => [5],
                "path" => "toekbokki-internazionale.png"
            ],
            [
                "name" => "Toriigate",
                "typologies" => [3, 1],
                "path" => "toriigate-giapponese.png"
            ],
            
        ];

        foreach($restaurants as $key => $restaurant){

            $newRestaurant = new Restaurant();

            $newRestaurant->seed = true;
            $newRestaurant->name = $restaurant["name"];
            $newRestaurant->slug = Str::slug($newRestaurant->name);
            $newRestaurant->image = $restaurant['path'];
            $newRestaurant->address = $faker->address();
            $newRestaurant->phone = $faker->phoneNumber();
            $newRestaurant->email = $faker->email();
            $newRestaurant->vat = $faker->numberBetween(10000000000,99999999999);
            $newRestaurant->description = $faker->paragraph(2);
            $newRestaurant->user_id = $key+1;

            $newRestaurant->save();

        }


        // per tabella pivot con le typologies
        $records = Restaurant::all();

        foreach($restaurants as $key => $restaurant){
            $typologies = $restaurant["typologies"];
            
            $records[$key]->typologies()->sync($typologies);
            $newRestaurant->save();
        }
        



        

        // se vuoi dei seeds sui restaurants più generici togli i commenti sotto e commenta sopra





        
        // for($i=0; $i<20; $i++){
            
        //     $newRestaurant = new Restaurant();

        //     $newRestaurant->name = ucfirst($faker->word());


        //     // creazione slug, verifica se già esistente e crea slug univoco su DB
        //     $newRestaurant->slug = Str::slug($newRestaurant->name);
        //     $counter = 1;
        //     while (Restaurant::where('slug', $newRestaurant->slug)->first()) {
        //         $newRestaurant->slug = Str::slug($newRestaurant->name) . '-' . $counter;
        //         $counter++;
        //     }
            
            
        //     $newRestaurant->address = $faker->address();
        //     $newRestaurant->phone = $faker->phoneNumber();
        //     $newRestaurant->email = $faker->email();
        //     $newRestaurant->vat = $faker->numberBetween(10000000000,99999999999);
        //     $newRestaurant->description = $faker->paragraph(2);
        //     $newRestaurant->user_id = $i+1;

        //     $newRestaurant->save();
        // }

        // // per tabella pivot con le typologies
        // $records = Restaurant::all();

        // for($i=0; $i<count($records); $i++){

        //     $n_typologies = rand(1,3);
        //     $typologies = [];
        //     for($j=0; $j<$n_typologies; $j++){
        //         $typologies[$j] = rand(1,10);
        //     }

        //     $records[$i]->typologies()->sync($typologies);
        //     $newRestaurant->save();
        // }

    }
}
