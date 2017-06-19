<?php

use App\Category;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();
        $faker = Faker::create();
        foreach (range(1, 20) as $item) {
            Category::create(['name' => ucfirst($faker->word())]);
        }
    }
}