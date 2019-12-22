<?php

use Illuminate\Database\Seeder;

class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Naim',
            'password' => bcrypt('password'),
            'email' => 'n@gmail.com'
        ]);

        App\User::create([
            'name' => 'User1',
            'password' => bcrypt('password'),
            'email' => 'u1@gmail.com'
        ]);

        App\User::create([
            'name' => 'User2',
            'password' => bcrypt('password'),
            'email' => 'u2@gmail.com'
        ]);

        App\User::create([
            'name' => 'User3',
            'password' => bcrypt('password'),
            'email' => 'u3@gmail.com'
        ]);
    }
}
