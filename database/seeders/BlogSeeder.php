<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            'id' => 1,
            'title' => 'My first ever Laravel guide + some basic Vue',
            'tip' => 'This guide concentrates on selft development rather than using some copy paste stuff.',
            'summary' => 'This topix cover some very simple guide opnm how to asd lasd authentication and some otherlea. ',
            'image' => '/some-url/',
            'description' => 'actual blog data goes here? depending on WYSIWYG editor ',
            'user_id' => 1,
            'verified' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
