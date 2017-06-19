<?php

use App\Blog;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BlogsTableSeeder extends Seeder
{


    public function run()
    {
        DB::table('blogs')->truncate();
        $faker = Faker::create();
        foreach (range(1, 100) as $item) {
            $category = \App\Category::inRandomOrder()->first();
            $category->blogs()->save(new Blog(['title' => ucfirst($faker->sentence()), 'post' => $faker->text(500), 'user_id' => 1]));
        }

    }

}