<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = collect([
            [
                "title" => "Artifical Intelligence",
                "description" => "Artifical Intelligence is a very popular field",
                "slug" => "AI",
                "likes" => 100,
                "user_id" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Web Development",
                "description" => "I am professional web developer",
                "slug" => "Web Dev",
                "likes" => 50,
                "user_id" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "bio Technology",
                "description" => "Bio Technology is a very popular field",
                "slug" => "Bio-tech",
                "likes" => 30,
                "user_id" => 2,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "MBBS",
                "description" => "MBBS stands for bachelors of medicine and bachelors of science",
                "slug" => "mbbs",
                "likes" => 10,
                "user_id" => 2,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "All fields",
                "description" => "All fields are good to study.",
                "slug" => "all-fields",
                "likes" => 5,
                "user_id" => 3,
                "created_at" => now(),
                "updated_at" => now()
            ]
        ]);

        DB::table("posts")->insert($posts->toArray());
    }
}
