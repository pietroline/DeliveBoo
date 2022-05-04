<?php

use App\Typology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typologies = ["Cinese", "Gelateria", "Giapponese", "Indiano", "Internazionale", "Italiano", "Messicano","Pizzeria", "Street food", "Vegetariano"];

        foreach($typologies as $typology){
            $newTypology = new Typology();

            $newTypology->name = $typology;
            $newTypology->slug = Str::slug($typology);

            $newTypology->save();
        }

    }
}
