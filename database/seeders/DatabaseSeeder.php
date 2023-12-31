<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(WorkSpaceSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(TaskUserSeeder::class);
    }
}
