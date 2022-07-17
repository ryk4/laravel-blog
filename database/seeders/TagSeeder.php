<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'id' => 1,
            'name' => 'Laravel',
            'style_class' => 'tag-light-green',
        ]);

        DB::table('tags')->insert([
            'id' => 2,
            'name' => 'Vue',
            'style_class' => 'tag-dark-blue',
        ]);

        DB::table('tags')->insert([
            'id' => 3,
            'name' => 'Pinia',
            'style_class' => 'tag-red',
        ]);

        DB::table('tags')->insert([
            'id' => 4,
            'name' => 'PHP',
            'style_class' => 'tag-dark-green',
        ]);

        DB::table('tags')->insert([
            'id' => 5,
            'name' => 'SQL',
            'style_class' => 'tag-red',
        ]);

        DB::table('tags')->insert([
            'id' => 6,
            'name' => 'Self improvement',
            'style_class' => 'tag-pink',
        ]);
    }
}
