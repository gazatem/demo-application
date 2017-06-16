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
        foreach (range(1, 500) as $item) {
            Blog::create(['title' => ucfirst($faker->sentence()), 'post' => $faker->text(500), 'user_id' => 1, 'category_id' => 1]);
        }

    }

}