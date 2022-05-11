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
        for($i=0; $i<60; $i++){
            
            $newFood = new Food();

            $newFood->name = ucfirst($faker->word());
            $newFood->slug = Str::slug($newFood->name); //è possibile che esistano più slug uguali quando $faker->word() ritorna porole uguali
            $newFood->category_id = $faker->numberBetween(1,10);
            $newFood->price = $faker->numberBetween(7, 25);
            $newFood->description = $faker->paragraph();
            
            $newFood->ingredients = $faker->words(5, true);
            $newFood->ingredients = str_replace(" ", ", ", $newFood->ingredients);

            $newFood->visible = rand(true, false);
            $newFood->restaurant_id = $faker->numberBetween(1,5);

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
