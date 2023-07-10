<?php

namespace Database\Seeders;
use App\Models\Status;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
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
            Status::create([
                'name' => $faker->word,
            ]);
        }
    }
}
