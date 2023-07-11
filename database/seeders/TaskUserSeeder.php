<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the tasks and assignees mapping
        $tasksAssignees = [
            [
                'task_id' => 1,
                'user_id' => 1,
            ],
            [
                'task_id' => 1,
                'user_id' => 2,
            ],
            [
                'task_id' => 2,
                'user_id' => 1,
            ],
            // Add more mappings as needed
            [
                'task_id' => 3,
                'user_id' => 2,
            ],
            [
                'task_id' => 4,
                'user_id' => 3,
            ],
            // Add more mappings to reach a minimum of 20 records
        ];

        // Insert the data into the tasks_users table
        DB::table('tasks_users')->insert($tasksAssignees);
    }

//        $minRecords = 20;
//
//        for ($i = 1; $i <= $minRecords; $i++) {
//            TaskUser::create([
//                'task_id' => // Set the task ID,
//                    'user_id' => // Set the user ID,
//            ]);
//        }

}
