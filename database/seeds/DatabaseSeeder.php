<?php

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
        if ($this->command->confirm('Do you want to refresh the database?',true)){
            $this->command->call('migrate:refresh');
            $this->command->info('the database was refreshed');
        }
        $this->call([
            UsersTableSeeder::class,
            TasksTableSeeder::class
        ]);
    }
}
