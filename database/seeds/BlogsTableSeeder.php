<?php

use App\Blog;
use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{


    public function run()
    {
        DB::table('blogs')->truncate();

        $faker = new Faker\Generator();
        $faker->addProvider(new Faker\Provider\Lorem($faker));
        foreach (range(1, 100) as $item) {

            $category = \App\Category::inRandomOrder()->first();
            $category->blogs()->save(new Blog(['title' => ucfirst($faker->sentence()), 'post' => $faker->text(500), 'user_id' => 1]));
        }

    }

}