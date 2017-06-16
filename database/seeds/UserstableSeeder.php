<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon as Carbon;


/**
 * Class UsersTableSeeder.
 */
class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        // Fake Collaborator
        $faker = new Faker\Generator();
        $faker->addProvider(new Faker\Provider\en_US\Person($faker));
        $faker->addProvider(new Faker\Provider\Internet($faker));
        $faker->addProvider(new Faker\Provider\Base($faker));


        for($i = 0; $i < 10; $i++){
            $data = [
                'name'              =>  $faker->name,
                'email'             =>  $faker->email,
                'password'          => bcrypt('1234'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ];
            User::create($data);
        }

    }
}
