<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Antipasto", "Primo", "Secondo", "Contorno","Frittura", "Rosticceria", "Panino", "Dolce", "Gelato", "Bibita"];

        foreach($categories as $category){
            $newCategory = new Category();

            $newCategory->name = $category;
            $newCategory->slug = Str::slug($category);

            $newCategory->save();
        }
    }
}
