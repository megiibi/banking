<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'user1',
                'email' => 'user1@email.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'user2',
                'email' => 'user2@email.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'user3',
                'email' => 'user3@email.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'user4',
                'email' => 'user4@email.com',
                'password' => bcrypt('password'),
            ]
        ]);
    }
}
