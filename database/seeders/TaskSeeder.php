<?php

namespace Database\Seeders;
use App\Models\Task;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
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
            Task::create([
                'name' => $faker->sentence(1),
                'description' => $faker->paragraph,
                'assignees' => $faker->numberBetween(1, 20), // Assuming there are 20 users seeded already
                'due_date' => $faker->date,
                'status_id' => $faker->numberBetween(1, 20), // Assuming there are 20 statuses seeded already
                'project_id' => $faker->numberBetween(1, 20), // Assuming there are 20 projects seeded already
                'priority' => $faker->randomElement(['high', 'medium', 'low']),
                'estimated_time' => $faker->time,
                'actual_time' => $faker->time,
            ]);
        }
    }
}
