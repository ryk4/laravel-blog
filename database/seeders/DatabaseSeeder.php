<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            TagSeeder::class,
            BlogSeeder::class,
            BlogTagSeeder::class,
            CommentSeeder::class
        ]);


//        BlogComment::factory(10)->create();

//        foreach (Blog::all() as $blog){
//            $blog->comments()->create();
//        }

        Blog::factory(3)
            ->has(BlogComment::factory()->count(3),'comments')
            ->create();
    }
}
