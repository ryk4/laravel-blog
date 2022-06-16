<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_comments')->insert([
            'id' => 1,
            'blog_id' => 1,
            'name' => 'Bob Builder',
            'email' => 'Bob.Builder@gmail.com',
            'website' => null,
            'comment' => 'This is a great guide man!',
            'created_at' => now()
        ]);

        DB::table('blog_comments')->insert([
            'id' => 2,
            'blog_id' => 1,
            'name' => 'Rytis Kli',
            'email' => 'Kli.Rytis@gmail.com',
            'website' => 'www.rytis.com',
            'comment' => 'Hmmm, this is a cool approach',
            'created_at' => now()
        ]);
    }
}
