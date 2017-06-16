<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();
        $faker = new Faker\Generator();
        $faker->addProvider(new Faker\Provider\Lorem($faker));
        foreach (range(1, 20) as $item) {
            Category::create(['name' => ucfirst($faker->word())]);
        }
    }
}