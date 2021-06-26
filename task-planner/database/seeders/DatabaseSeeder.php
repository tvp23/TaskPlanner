<?php

namespace Database\Seeders;

use Database\Factories\TasksFactory;
use Database\Factories\UserFactory;
use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            'status' => 'Completed',
        ]);
        DB::table('status')->insert([
            'status' => 'Current',
        ]);
        DB::table('status')->insert([
            'status' => 'On Hold',
        ]);
        DB::table('status')->insert([
            'status' => 'Canceled',
        ]);

        User::factory()
            ->count(1)
            ->create();

        Task::factory()
            ->count(50)
            ->create();
    }
}
