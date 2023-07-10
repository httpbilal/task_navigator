<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
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
            Project::create([
                'name' => $faker->sentence(1),
                'description' => $faker->paragraph,
                'start_date' => $faker->date,
                'end_date' => $faker->date,
                'workspace' => $faker->numberBetween(1, 20), // Assuming there are 20 workspaces seeded already
            ]);
        }
    }
}
