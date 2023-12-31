<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use App\Models\WorkSpace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkSpaceSeeder extends Seeder
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
            WorkSpace::create([
                'name' => $faker->company,
                'capacity' => $faker->numberBetween(1, 100),
                'owner' => $faker->numberBetween(1, 20), // Assuming there are 20 users seeded already
            ]);
        }
    }
}
