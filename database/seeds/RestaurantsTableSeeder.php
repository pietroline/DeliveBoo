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
                "tipology" => ["vegano"],
                "path" => "alGazebo-vegano.png"
            ],
            [
                "name" => "amarJakal",
                "tipology" => ["indiano", "internazionale"],
                "path" => "amarJakadal-indiano.png"
            ],
            [
                "name" => "Cadde Burger",
                "tipology" => ["street food"],
                "path" => "caddeBurger-streetfood.png"
            ],
            [
                "name" => "Casa del Ramen",
                "tipology" => ["giapponese", "cinese"],
                "path" => "casaDelRamen-giapponese.png"
            ],
            [
                "name" => "Da Vittorio",
                "tipology" => ["italiano", "pizzeria", "vegetariano"],
                "path" => "daVittorio-italiano.png"
            ],
            [
                "name" => "Dolci delizie",
                "tipology" => ["gelateria", "vegano"],
                "path" => "dolciDelizie-gelateria.png"
            ],
            [
                "name" => "donPacho",
                "tipology" => ["messicano", "internazionale"],
                "path" => "donPacho-messicano.png"
            ],
            [
                "name" => "Hot spot",
                "tipology" => ["internazionale"],
                "path" => "hotSpot-internazionale.png"
            ],
            [
                "name" => "Lanterna Rossa",
                "tipology" => ["cinese", "pizzeria"],
                "path" => "lanternaRossa-cinese.png"
            ],
            [
                "name" => "LeafinGreen",
                "tipology" => ["vegano", "vegetariano"],
                "path" => "leafinGreen-vegano.png"
            ],
            [
                "name" => "Mashed Potato",
                "tipology" => ["street food"],
                "path" => "mashedPotato-streetfood.png"
            ],
            [
                "name" => "Milkosa",
                "tipology" => ["gelateria"],
                "path" => "milkosa-gelateria.png"
            ],
            [
                "name" => "Paradiso degli Hamb",
                "tipology" => ["street food"],
                "path" => "paradisoDegliHamb-streetfood.png"
            ],
            [
                "name" => "Pizza Slice",
                "tipology" => ["pizzeria", "italiano"],
                "path" => "pizzaSlice-pizzeria.png"
            ],
            [
                "name" => "SpicyPizza",
                "tipology" => ["pizzeria", "street food"],
                "path" => "spicyPizza-pizzeria.png"
            ],
            [
                "name" => "Sushi brand",
                "tipology" => ["giapponese", "internazionale"],
                "path" => "sushibrand-giapponese.png"
            ],
            [
                "name" => "TacoBill",
                "tipology" => ["messicano"],
                "path" => "tacoBill-messicano.png"

            ],
            [
                "name" => "Toekbokki",
                "tipology" => ["internazionale"],
                "path" => "toekbokki-internazionale.png"
            ],
            [
                "name" => "Toriigate",
                "tipology" => ["giapponese", "cinese"],
                "path" => "toriigate-giapponese.png"
            ],
            
        ];

        foreach($restaurants as $key => $restaurant){

            $newRestaurant = new Restaurant();

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
