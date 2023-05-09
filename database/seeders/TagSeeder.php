<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Technology', 'Programming', 'Web Development', 'Mobile Development', 'Artificial Intelligence'];

        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'name' => $tag,
            ]);
        }
    }
}
