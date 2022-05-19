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

        
        $foods = [
            [
                'name' => 'Alette di Pollo',
                'path' => 'alettePollo-streetFood.png',
                'category_id' => '6',
                'restaurant_id' => '13',

            ],
            [
                'name' => 'American Nuggets',
                'path' => 'americanNuggets-streetFood.png',
                'category_id' => '5',
                'restaurant_id' => '11',
            ],
            [
                'name' => 'Anatra alla Pechinese',
                'path' => 'anatraPechinese-cinese.png',
                'category_id' => '3',
                'restaurant_id' => '9',
            ],
            [
                'name' => 'Bibimbap',
                'path' => 'Bibimbap-internazionale.png',
                'category_id' => '2',
                'restaurant_id' => '18',
            ],
            [
                'name' => 'Bulgogi',
                'path' => 'bulgogi-internazionale.png',
                'category_id' => '1',
                'restaurant_id' => '18',
            ],
            [
                'name' => 'Burrito Completo',
                'path' => 'burritoCompleto-messicano.png',
                'category_id' => '2',
                'restaurant_id' => '17',
            ],
            [
                'name' => 'Burrito con Pollo',
                'path' => 'burritoPollo-messicano.png',
                'category_id' => '2',
                'restaurant_id' => '17',
            ],
            [
                'name' => 'Burrito Spicy',
                'path' => 'burritoSpicy-messicano.png',
                'category_id' => '2',
                'restaurant_id' => '7',
            ],
            [
                'name' => 'Pasta alla Carbonara',
                'path' => 'carbonara-italiano.png',
                'category_id' => '2',
                'restaurant_id' => '5',
            ],
            [
                'name' => 'Carpaccio di Salmone',
                'path' => 'CarpaccioSalmone-giapponese.png',
                'category_id' => '3',
                'restaurant_id' => '19',
            ],
            [
                'name' => 'Coppa Special',
                'path' => 'coppaSpecial-gelateria.png',
                'category_id' => '9',
                'restaurant_id' => '6',
            ],
            [
                'name' => 'Cotoletta con Patate',
                'path' => 'cotolettaPatatine-italiano.png',
                'category_id' => '3',
                'restaurant_id' => '5',
            ],
            [
                'name' => 'Crocchè Classico',
                'path' => 'croccheFritti-StreetFood.png',
                'category_id' => '5',
                'restaurant_id' => '11',
            ],
            [
                'name' => 'Crocchè Vegano',
                'path' => 'croccheVegani-vegetariano.png',
                'category_id' => '6',
                'restaurant_id' => '1',
            ],
            [
                'name' => 'Donut',
                'path' => 'donuts-gelateria.png',
                'category_id' => '8',
                'restaurant_id' => '6',
            ],
            [
                'name' => 'Smashed Hamburger',
                'path' => 'DoppioHambCheddarBacon-streetFood.png',
                'category_id' => '7',
                'restaurant_id' => '3',
            ],
            [
                'name' => 'Filetto di Agnello',
                'path' => 'filettoAgnello-italiano.png',
                'category_id' => '3',
                'restaurant_id' => '5',
            ],
            [
                'name' => 'Gamberi Fritti',
                'path' => 'frittoGamberi-italiano.png',
                'category_id' => '5',
                'restaurant_id' => '5',
            ],
            [
                'name' => 'Frittura in Tempura',
                'path' => 'frittoTempura-cinese.png',
                'category_id' => '5',
                'restaurant_id' => '16',
            ],
            [
                'name' => 'Galbi',
                'path' => 'Galbi-internazionale.png',
                'category_id' => '1',
                'restaurant_id' => '8',
            ],
            [
                'name' => 'Gamberi in Salsa di Soia',
                'path' => 'gamberiSalsaSoia-cinese.png',
                'category_id' => '3',
                'restaurant_id' => '9',
            ],
            [
                'name' => 'Haemultang',
                'path' => 'Haemultang-internazionale.png',
                'category_id' => '3',
                'restaurant_id' => '8',
            ],
            [
                'name' => 'Hamburger Classico',
                'path' => 'HambCipInsalPomod-streetFood.png',
                'category_id' => '7',
                'restaurant_id' => '13',
            ],
            [
                'name' => 'Hamburger con Uovo',
                'path' => 'HambInsPomUovo-streetFood.png',
                'category_id' => '7',
                'restaurant_id' => '13',
            ],
            [
                'name' => 'Hosomaki Misto',
                'path' => 'hosomakiMisto.png',
                'category_id' => '3',
                'restaurant_id' => '16',
            ],
            [
                'name' => 'Hosomaki con Salmone',
                'path' => 'hosomakiSalmone.png',
                'category_id' => '3',
                'restaurant_id' => '19',
            ],
            [
                'name' => 'Involtini Primavera',
                'path' => 'involtinoPrimavera-cinese.png',
                'category_id' => '1',
                'restaurant_id' => '9',
            ],
            [
                'name' => 'Laddu',
                'path' => 'laddu-indiano.png',
                'category_id' => '8',
                'restaurant_id' => '2',
            ],
            [
                'name' => 'Macarons',
                'path' => 'macaron-gelateria.png',
                'category_id' => '8',
                'restaurant_id' => '6',
            ],
            [
                'name' => 'Montanara fritta',
                'path' => 'montanaraFritta-StreetFood.png',
                'category_id' => '6',
                'restaurant_id' => '11',
            ],
            [
                'name' => 'Naengmyeon',
                'path' => 'Naengmyeon-internazionale.png',
                'category_id' => '2',
                'restaurant_id' => '4',
            ],
            [
                'name' => 'Nigiri con Salmone',
                'path' => 'nigiriSalmone.png',
                'category_id' => '3',
                'restaurant_id' => '16',
            ],
            [
                'name' => 'Pakora',
                'path' => 'pakora-indiano.png',
                'category_id' => '3',
                'restaurant_id' => '2',
            ],
            [
                'name' => 'Palak Paneer',
                'path' => 'PalakPaneer-indiano.png',
                'category_id' => '2',
                'restaurant_id' => '2',
            ],
            [
                'name' => 'Pane Naan',
                'path' => 'paneNaan-indiano.png',
                'category_id' => '1',
                'restaurant_id' => '2',
            ],
            [
                'name' => 'Panino Vegano',
                'path' => 'paninoVegano-vegetariano.png',
                'category_id' => '7',
                'restaurant_id' => '10',
            ],
            [
                'name' => 'Parmigiana',
                'path' => 'parmigiana-italiano.png',
                'category_id' => '4',
                'restaurant_id' => '5',
            ],
            [
                'name' => 'Pasta alla Siciliana',
                'path' => 'pastaSiciliana-italiano.png',
                'category_id' => '2',
                'restaurant_id' => '5',
            ],
            [
                'name' => 'Pasticceria Assortita 1kg',
                'path' => 'pastAssortita1kg-gelateria.png',
                'category_id' => '8',
                'restaurant_id' => '6',
            ],
            [
                'name' => 'Penne con Salsa al Pomodoro',
                'path' => 'pennetteSalsa-italiano.png',
                'category_id' => '2',
                'restaurant_id' => '5',
            ],
            [
                'name' => 'Pesce Spada Scottato',
                'path' => 'pesceSpada-italiano.png',
                'category_id' => '3',
                'restaurant_id' => '5',
            ],
            [
                'name' => 'Pizza 4 Formaggi',
                'path' => 'pizza4Formaggi-pizzeria.png',
                'category_id' => '2',
                'restaurant_id' => '14',
            ],
            [
                'name' => 'Pizza Diavola',
                'path' => 'pizzaDiavola-pizzeria.png',
                'category_id' => '2',
                'restaurant_id' => '15',
            ],
            [
                'name' => 'Pizza Margherita',
                'path' => 'pizzaMargherita.png',
                'category_id' => '2',
                'restaurant_id' => '14',
            ],
            [
                'name' => 'Pizza Ortolana',
                'path' => 'pizzaOrtolana-pizzeria.png',
                'category_id' => '2',
                'restaurant_id' => '15',
            ],
            [
                'name' => 'Pizza con Patate',
                'path' => 'pizzaPatate-pizzeria.png',
                'category_id' => '2',
                'restaurant_id' => '14',
            ],
            [
                'name' => 'Pizza con Polpette al Sugo',
                'path' => 'pizzaPolpette-pizzeria.png',
                'category_id' => '2',
                'restaurant_id' => '15',
            ],
            [
                'name' => 'Pizza Primavera',
                'path' => 'pizzaPrimavera-pizzeria.png',
                'category_id' => '2',
                'restaurant_id' => '14',
            ],
            [
                'name' => 'Pizza con Wurstel',
                'path' => 'pizzaWurstel-pizzeria.png',
                'category_id' => '2',
                'restaurant_id' => '15',
            ],
            [
                'name' => 'Poke Vegana',
                'path' => 'pokeVegana-vegetariano.png',
                'category_id' => '2',
                'restaurant_id' => '10',
            ],
            [
                'name' => 'Pollo in Tempura',
                'path' => 'polloInTempura-giapponese.png',
                'category_id' => '3',
                'restaurant_id' => '19',
            ],
            [
                'name' => 'Pollo Tandori',
                'path' => 'polloTandori-indiano.png',
                'category_id' => '3',
                'restaurant_id' => '2',
            ],
            [
                'name' => 'Polpette al Sugo',
                'path' => 'polpetteSugo-italiano.png',
                'category_id' => '3',
                'restaurant_id' => '5',
            ],
            [
                'name' => 'Porzione di patate Large',
                'path' => 'porzionePatateGrande-streetFood.png',
                'category_id' => '5',
                'restaurant_id' => '11',
            ],
            [
                'name' => 'Porzione di Patate Small',
                'path' => 'porzionePatateSmall-streetFood.png',
                'category_id' => '5',
                'restaurant_id' => '11',
            ],
            [
                'name' => 'Quesadilla BBQ',
                'path' => 'quesadillaBBQ-messicano.png',
                'category_id' => '1',
                'restaurant_id' => '17',
            ],
            [
                'name' => 'Quesadilla Classica',
                'path' => 'quesadillaClassica-messicano.png',
                'category_id' => '1',
                'restaurant_id' => '7',
            ],
            [
                'name' => 'Quesadilla con Verdure',
                'path' => 'quesadillaVerdure-messicano.png',
                'category_id' => '1',
                'restaurant_id' => '17',
            ],
            [
                'name' => 'Ravioli al Vapore',
                'path' => 'ravioliVapore-cinese.png',
                'category_id' => '2',
                'restaurant_id' => '9',
            ],
            [
                'name' => 'Rigatoni al Pesto',
                'path' => 'rigatoniPesto-italiano.png',
                'category_id' => '2',
                'restaurant_id' => '5',
            ],
            [
                'name' => 'Riso alla Cantonese',
                'path' => 'risoCantonese-cinese.png',
                'category_id' => '2',
                'restaurant_id' => '9',
            ],
            [
                'name' => 'Samgyetang',
                'path' => 'Samgyetang-internazionale.png',
                'category_id' => '2',
                'restaurant_id' => '18',
            ],
            [
                'name' => 'Samosa',
                'path' => 'samosa-indiano.png',
                'category_id' => '1',
                'restaurant_id' => '2',
            ],
            [
                'name' => 'Sashimi di Tonno e Salmone',
                'path' => 'sashimiTonnoSalmone-giapp.png',
                'category_id' => '3',
                'restaurant_id' => '16',
            ],
            [
                'name' => 'Set Sushi 40pz',
                'path' => 'set40pezzi-giapponese.png',
                'category_id' => '2',
                'restaurant_id' => '16',
            ],
            [
                'name' => 'Spaghetti Saltati',
                'path' => 'spaghettiSaltati-cinese.png',
                'category_id' => '2',
                'restaurant_id' => '9',
            ],
            [
                'name' => 'Sushi Vegano',
                'path' => 'sushiVegano-vegetariano.png',
                'category_id' => '2',
                'restaurant_id' => '1',
            ],
            [
                'name' => 'Taco Classico',
                'path' => 'tacoClassico-messicano.png',
                'category_id' => '1',
                'restaurant_id' => '17',
            ],
            [
                'name' => 'Taco Gourmet',
                'path' => 'TacoGourmet-messicano.png',
                'category_id' => '1',
                'restaurant_id' => '7',
            ],
            [
                'name' => 'Taco con Peperoni',
                'path' => 'TacoPeperoni-messicano.png',
                'category_id' => '1',
                'restaurant_id' => '17',
            ],
            [
                'name' => 'Taco Vegetariano',
                'path' => 'TacoRisoVerdure-vegetariano.png',
                'category_id' => '1',
                'restaurant_id' => '1',
            ],
            [
                'name' => 'Tikka Masala',
                'path' => 'tikkaMasala-indiano.png',
                'category_id' => '2',
                'restaurant_id' => '2',
            ],
            [
                'name' => 'Tiramisù',
                'path' => 'tiramisu-gelateria.png',
                'category_id' => '8',
                'restaurant_id' => '12',
            ],
            [
                'name' => 'Tortino Vegano',
                'path' => 'tortinoVegano-vegetariano.png',
                'category_id' => '8',
                'restaurant_id' => '10',
            ],
            [
                'name' => 'Tris di Muffin',
                'path' => 'trisMuffin-gelateria.png',
                'category_id' => '8',
                'restaurant_id' => '6',
            ],
            [
                'name' => 'Uramaki',
                'path' => 'uramaki.png',
                'category_id' => '3',
                'restaurant_id' => '19',
            ],
            [
                'name' => 'Vasca Gelato 0.5kg',
                'path' => 'vasca0.5kg-gelateria.png',
                'category_id' => '9',
                'restaurant_id' => '12',
            ],
            [
                'name' => 'Vasca Gelato 5 Gusti 1kg',
                'path' => 'vasca5gusti-gelateria.png',
                'category_id' => '9',
                'restaurant_id' => '12',
            ],
            [
                'name' => 'Verdure Miste alla Brace',
                'path' => 'verdureMisteBrace-vegetariano.png',
                'category_id' => '4',
                'restaurant_id' => '1',
            ],
            [
                'name' => 'Zuppa Calda',
                'path' => 'zuppacalda-cinese.png',
                'category_id' => '2',
                'restaurant_id' => '9',
            ],
            [
                'name' => 'Zuppa Coreana',
                'path' => 'zuppaCoreana-internazionale.png',
                'category_id' => '2',
                'restaurant_id' => '18',
            ],
            [
                'name' => 'Zuppa Mista con Fritto Caldo',
                'path' => 'zuppamistacalda-giapponese.png',
                'category_id' => '2',
                'restaurant_id' => '16',
            ],
            [
                'name' => 'Zuppa con Noodles',
                'path' => 'zuppamista-giapponese.png',
                'category_id' => '2',
                'restaurant_id' => '8',
            ],
            [
                'name' => 'Zuppa di Verdure',
                'path' => 'zuppaVerdure-vegetariano.png',
                'category_id' => '2',
                'restaurant_id' => '10',
            ],
          
            

        ];




       


        foreach($foods as $food) {
            $newFood = new Food();

            $newFood->seed = true;
            $newFood->name = $food['name'];
            $newFood->slug = Str::slug($newFood->name);
            $newFood->image = $food['path'];
            $newFood->category_id = $food['category_id'];



            $newFood->description = $faker->paragraph();
            $newFood->price = $faker->numberBetween(5, 15);
            $newFood->ingredients = $faker->words(5, true);
            $newFood->ingredients = str_replace(" ", ", ", $newFood->ingredients);

            $newFood->visible = rand(true, false);


            $newFood->restaurant_id =$food['restaurant_id'];


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
