<?php

namespace Database\Seeders;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            User::create([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'email' => $faker->unique()->email,
                'password' => bcrypt('password'), // Replace with your desired password
            ]);
        }
    }
}
