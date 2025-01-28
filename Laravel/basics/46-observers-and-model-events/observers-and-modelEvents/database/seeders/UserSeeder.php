<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = collect([
            [
                "name" => "Haseeb Yousaf",
                "email" => "haseebyousaf@gmail.com"
            ],
            [
                "name" => "Sami Yousaf",
                "email" => "samiyousaf@gmail.com"
            ],
            [
                "name" => "Mohsin Yousaf",
                "email" => "mohsinyousaf@gmail.com"
            ]
        ]);

        $users->each(function($user){
            User::create($user);
        });
    }
}
