<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            [
                'name' => 'Admin User 1',
                'level' => 'admin',
                'email' => 'admin1@example.com',
                'password' => bcrypt('password1'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin User 2',
                'level' => 'admin',
                'email' => 'admin2@example.com',
                'password' => bcrypt('password2'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin User 3',
                'level' => 'admin',
                'email' => 'admin3@example.com',
                'password' => bcrypt('password3'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
