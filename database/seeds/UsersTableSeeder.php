<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(faker $faker)
    {
        for($i=0; $i<5; $i++){

            $newUser = new User();

            $newUser->name = $faker->word();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make('testtest');;
           
            $newUser->save();
        }
    }
}
