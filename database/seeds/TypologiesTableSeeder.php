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

        $typologies = [
            [
                'name' => 'Cinese',
                'path' => 'cinese.jpg'
            ],
            [
                'name' => 'Gelateria',
                'path' => 'gelateria.jpg'
            ],
            [
                'name' => 'Giapponese',
                'path' => 'giapponese.jpg'
            ],
            [
                'name' => 'Indiano',
                'path' => 'indiano.jpg'
            ],
            [
                'name' => 'Internazionale',
                'path' => 'internazionale.jpg'
            ],
            [
                'name' => 'Italiano',
                'path' => 'italiano.jpg'
            ],
            [
                'name' => 'Messicano',
                'path' => 'messicano.jpg'
            ],
            [
                'name' => 'Pizzeria',
                'path' => 'pizzeria.jpg'
            ],
            [
                'name' => 'Street food',
                'path' => 'street-food.jpg'
            ],
            [
                'name' => 'Vegetariano',
                'path' => 'vegetariano.jpg'
            ],

        ];


        foreach($typologies as $typology){
            $newTypology = new Typology();

            $newTypology->seed = true;
            $newTypology->name = $typology['name'];
            $newTypology->slug = Str::slug($typology['name']);
            $newTypology->image = $typology['path'];

            $newTypology->save();
        }

    }
}
