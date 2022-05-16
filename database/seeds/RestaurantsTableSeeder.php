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
                "tipology" => ["vegano"]
            ],
            [
                "name" => "amarJakal",
                "tipology" => ["indiano", "internazionale"]
            ],
            [
                "name" => "Cadde Burger",
                "tipology" => ["street food"]
            ],
            [
                "name" => "Cadde del Ramen",
                "tipology" => ["giapponese", "cinese"]
            ],
            [
                "name" => "Da Vittorio",
                "tipology" => ["italiano", "pizzeria", "vegetariano"]
            ],
            [
                "name" => "Dolci delizie",
                "tipology" => ["gelateria", "vegano"]
            ],
            [
                "name" => "donPacho",
                "tipology" => ["messicano", "internazionale"]
            ],
            [
                "name" => "Hot spot",
                "tipology" => ["internazionale"]
            ],
            [
                "name" => "Lanterna Rossa",
                "tipology" => ["cinese", "pizzeria"]
            ],
            [
                "name" => "LeafinGreen",
                "tipology" => ["vegano", "vegetariano"]
            ],
            [
                "name" => "Mashed Potato",
                "tipology" => ["street food"]
            ],
            [
                "name" => "Milkosa",
                "tipology" => ["gelateria"]
            ],
            [
                "name" => "Paradiso degli Hamb",
                "tipology" => ["street food"]
            ],
            [
                "name" => "Pizza Slice",
                "tipology" => ["pizzeria", "italiano"]
            ],
            [
                "name" => "SpicyPizza",
                "tipology" => ["pizzeria", "street food"]
            ],
            [
                "name" => "Sushi brand",
                "tipology" => ["giapponese", "internazionale"]
            ],
            [
                "name" => "TacoBill",
                "tipology" => ["messicano"]
            ],
            [
                "name" => "Toekbokki",
                "tipology" => ["internazionale"]
            ],
            [
                "name" => "Toriigate",
                "tipology" => ["giapponese", "cinese"]
            ],
            
        ];

        foreach($restaurants as $key => $restaurant){

            $newRestaurant = new Restaurant();

            $newRestaurant->name = $restaurant["name"];
            $newRestaurant->slug = Str::slug($newRestaurant->name);
           
            $newRestaurant->address = $faker->address();
            $newRestaurant->phone = $faker->phoneNumber();
            $newRestaurant->email = $faker->email();
            $newRestaurant->vat = $faker->numberBetween(10000000000,99999999999);
            $newRestaurant->description = $faker->paragraph(2);
            $newRestaurant->user_id = $key+1;

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

        // for($i=0; $i<20; $i++){

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
