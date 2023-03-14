<?php

use App\Task;
use App\User;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nTasks = (int)$this->command->ask('how many tasks',50);
        $usrs = User::all();
        factory(Task::class,$nTasks)->make()->each(function ($tsk) use ($usrs) {
            $tsk->user_id = $usrs->random()->id;
            $tsk->save();
        });
    }
}
