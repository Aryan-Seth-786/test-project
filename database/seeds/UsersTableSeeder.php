<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nUsers = (int)$this->command->ask('how many users?',20);
        $this->command->info('now going to create users');
        factory(User::class,$nUsers)->create();
    }
}
