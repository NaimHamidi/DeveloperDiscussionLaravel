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
        $this->call(UsersTable::class);
        $this->call(DiscussionTable::class);
        $this->call(ReplyTable::class);
    }
}
