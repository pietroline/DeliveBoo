<?php

use App\Food;
use App\Order;
use App\Restaurant;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\support\Str;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        
        $typologies = [
            [
                'name' => 'Alette di Pollo',
                'path' => 'alettePollo-streetFood.png',
                'category_id' => '6',
                'description' => '',
                'restaurant_id' => '',

            ],
            [
                'name' => 'American Nuggets',
                'path' => 'americanNuggets-streetFood.png',
                'category_id' => '5',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Anatra alla Pechinese',
                'path' => 'anatraPechinese-cinese.png',
                'category_id' => '3',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Bibimbap',
                'path' => 'Bibimbap-internazionale.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Bulgogi',
                'path' => 'bulgogi-internazionale.png',
                'category_id' => '1',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Burrito Completo',
                'path' => 'burritoCompleto-messicano.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Burrito con Pollo',
                'path' => 'burritoPollo-messicano.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Burrito Spicy',
                'path' => 'burritoSpicy-messicano.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Pasta alla Carbonara',
                'path' => 'carbonara-italiano.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Carpaccio di Salmone',
                'path' => 'CarpaccioSalmone-giapponese.png',
                'category_id' => '3',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Coppa Special',
                'path' => 'coppaSpecial-gelateria.png',
                'category_id' => '9',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Cotoletta con Patate',
                'path' => 'cotolettaPatatine-italiano.png',
                'category_id' => '3',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Crocchè Classico',
                'path' => 'croccheFritti-StreetFood',
                'category_id' => '5',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Crocchè Vegano',
                'path' => 'croccheVegani-vegetariano.png',
                'category_id' => '6',
                'description' => '',
                'restaurant_id' => '1',
            ],
            [
                'name' => 'Donut',
                'path' => 'donuts-gelateria.png',
                'category_id' => '8',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Smashed Hamburger',
                'path' => 'DoppioHambCheddarBacon-streetFood.png',
                'category_id' => '7',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Filetto di Agnello',
                'path' => 'filettoAgnello-italiano.png',
                'category_id' => '3',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Gamberi Fritti',
                'path' => 'frittoGamberi-italiano.png',
                'category_id' => '5',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Frittura in Tempura',
                'path' => 'frittoTempura-cinese.png',
                'category_id' => '5',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Galbi',
                'path' => 'Galbi-internazionale.png',
                'category_id' => '1',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Gamberi in Salsa di Soia',
                'path' => 'gamberiSalsaSoia-cinese.png',
                'category_id' => '3',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Haemultang',
                'path' => 'Haemultang-internazionale.png',
                'category_id' => '3',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Hamburger Classico',
                'path' => 'HambCipInsalPomod-streetFood.png',
                'category_id' => '7',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Hamburger con Uovo',
                'path' => 'HambInsPomUovo-streetFood.png',
                'category_id' => '7',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Hosomaki Misto',
                'path' => 'hosomakiMisto.png',
                'category_id' => '3',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Hosomaki con Salmone',
                'path' => 'hosomakiSalmone.png',
                'category_id' => '3',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Involtini Primavera',
                'path' => 'involtinoPrimavera-cinese.png',
                'category_id' => '1',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Laddu',
                'path' => 'laddu-indiano.png',
                'category_id' => '8',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Macarons',
                'path' => 'macaron-gelateria,png',
                'category_id' => '8',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Montanara fritta',
                'path' => 'montanaraFritta-StreetFood.png',
                'category_id' => '6',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Naengmyeon',
                'path' => 'Naengmyeon-internazionale.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Nigiri con Salmone',
                'path' => 'nigiriSalmone.png',
                'category_id' => '',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Pakora',
                'path' => 'pakora-indiano.png',
                'category_id' => '3',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Palak Paneer',
                'path' => 'PalakPaneer-indiano.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Pane Naan',
                'path' => 'paneNaan-indiano.png',
                'category_id' => '1',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Panino Vegano',
                'path' => 'paninoVegano-vegetariano.png',
                'category_id' => '7',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Parmigiana',
                'path' => 'parmigiana-italiano.png',
                'category_id' => '4',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Pasta alla Siciliana',
                'path' => 'pastaSiciliana-italiano.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Pasticceria Assortita 1kg',
                'path' => 'pastAssortita1kg-gelateria.png',
                'category_id' => '8',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Penne con Salsa al Pomodoro',
                'path' => 'pennetteSalsa-italiano.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Pesce Spada Scottato',
                'path' => 'pesceSpada-italiano.png',
                'category_id' => '3',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Pizza 4 Formaggi',
                'path' => 'pizza4Formaggi-pizzeria.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Pizza Diavola',
                'path' => 'pizzaDiavola-pizzeria.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Pizza Margherita',
                'path' => 'pizzaMargherita.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Pizza Ortolana',
                'path' => 'pizzaOrtolana-pizzeria.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Pizza con Patate',
                'path' => 'pizzaPatate-pizzeria.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Pizza con Polpette al Sugo',
                'path' => 'pizzaPolpette-pizzeria.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Pizza Primavera',
                'path' => 'pizzaPrimavera-pizzeria.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Pizza con Wurstel',
                'path' => 'pizzaWurstel-pizzeria.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Poke Vegana',
                'path' => 'pokeVegana-vegetariano.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Pollo in Tempura',
                'path' => 'polloInTempura-giapponese.png',
                'category_id' => '3',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Pollo Tandori',
                'path' => 'polloTandori-indiano.png',
                'category_id' => '3',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Polpette al Sugo',
                'path' => 'polpetteSugo-italiano.png',
                'category_id' => '3',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Porzione di patate Large',
                'path' => 'porzionePatateGrande-streetFood.png',
                'category_id' => '5',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Porzione di Patate Small',
                'path' => 'porzionePatateSmall-streetFood.png',
                'category_id' => '5',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Quesadilla BBQ',
                'path' => 'quesadillaBBQ-messicano.png',
                'category_id' => '1',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Quesadilla Classica',
                'path' => 'quesadillaClassica-messicano.png',
                'category_id' => '1',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Quesadilla con Verdure',
                'path' => 'quesadillaVerdure-messicano.png',
                'category_id' => '1',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Ravioli al Vapore',
                'path' => 'ravioliVapore-cinese.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Rigatoni al Pesto',
                'path' => 'rigatoniPesto-italiano.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Riso alla Cantonese',
                'path' => 'risoCantonese-cinese.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Samgyetang',
                'path' => 'Samgyetang-internazionale.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Samosa',
                'path' => 'samosa-indiano.png',
                'category_id' => '1',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Sashimi di Tonno e Salmone',
                'path' => 'sashimiTonnoSalmone-giapp.png',
                'category_id' => '3',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Set Sushi 40pz',
                'path' => 'set40pezzi-giapponese.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Spaghetti Saltati',
                'path' => 'spaghettiSaltati-cinese.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Sushi Vegano',
                'path' => 'sushiVegano-vegetariano.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Taco Classico',
                'path' => 'tacoClassico-messicano.png',
                'category_id' => '1',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Taco Gourmet',
                'path' => 'TacoGourmet-messicano.png',
                'category_id' => '1',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Taco con Peperoni',
                'path' => 'TacoPeperoni-messicano.png',
                'category_id' => '1',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Taco Vegetariano',
                'path' => 'TacoRisoVerdure-vegetariano.png',
                'category_id' => '1',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Tikka Masala',
                'path' => 'tikkaMasala-indiano.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Tiramisù',
                'path' => 'tiramisu-gelateria.png',
                'category_id' => '8',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Tortino Vegano',
                'path' => 'tortinoVegano-vegetariano.png',
                'category_id' => '8',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Tris di Muffin',
                'path' => 'trisMuffin-gelateria.png',
                'category_id' => '8',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Uramaki',
                'path' => 'uramaki.png',
                'category_id' => '3',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Vasca Gelato 0.5kg',
                'path' => 'vasca0.5kg-gelateria.png',
                'category_id' => '9',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Vasca Gelato 5 Gusti 1kg',
                'path' => 'vasca5gusti-gelateria.png',
                'category_id' => '9',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Verdure Miste alla Brace',
                'path' => 'verdureMisteBrace-vegetariano.png',
                'category_id' => '4',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Zuppa Calda',
                'path' => 'zuppacalda-cinese.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Zuppa Coreana',
                'path' => 'zuppaCoreana-internazionale.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Zuppa Mista con Fritto Caldo',
                'path' => 'zuppamistacalda-giapponese.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Zuppa con Noodles',
                'path' => 'zuppamista-giapponese.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
            [
                'name' => 'Zuppa di Verdure',
                'path' => 'zuppaVerdure-vegetariano.png',
                'category_id' => '2',
                'description' => '',
                'restaurant_id' => '',
            ],
          
            

        ];




        for($i=0; $i<160; $i++){
            
            $newFood = new Food();

            $newFood->name = ucfirst($faker->word());

            // creazione slug, verifica se già esistente e crea slug univoco su DB
            $newFood->slug = Str::slug($newFood->name);
            $counter = 1;
            while (Food::where('slug', $newFood->slug)->first()) {
                $newFood->slug = Str::slug($newFood->name) . '-' . $counter;
                $counter++;
            }

            $newFood->category_id = $faker->numberBetween(1,10);
            $newFood->price = $faker->numberBetween(7, 25);
            $newFood->description = $faker->paragraph();
            
            $newFood->ingredients = $faker->words(5, true);
            $newFood->ingredients = str_replace(" ", ", ", $newFood->ingredients);

            $newFood->visible = rand(true, false);
            $newFood->restaurant_id = $faker->numberBetween(1,20);

            $newFood->save();
        }

        // per tabella pivot con le orders
        for($k=0; $k<Restaurant::count(); $k++){ //ciclo i ristoranti

            $records = Food::where("restaurant_id", $k+1)->get(); //$records contiene solo i cibi del ristorante k-esimo

            for($i=0; $i<count($records); $i++){ //ciclo i cibi del ristorante

                $n_foods = rand(1,5); //definisco quanti cibi deve contenere l'ordine
                $orders = [];

                // in base a quanti cibi sono stati definiti per un ordine, popolo l'array dell'ordine
                for($j=0; $j<$n_foods; $j++){ 
                    $orders[$j] = rand(1,Order::count());
                }

                //imposto tabella pivot con attach dell'ordine
                //ATTENZIONE: utilizzato metodo attach in maniera tale da passare un secondo array con la quantity, questo non funziona con sync
                $records[$i]->orders()->attach($orders, ['quantity' => rand(1,3)]); 
                 
                $newFood->save();
            }

        }
    }
}
