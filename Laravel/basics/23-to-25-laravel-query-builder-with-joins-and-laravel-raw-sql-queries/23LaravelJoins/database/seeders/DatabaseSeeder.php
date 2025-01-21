<?php

namespace Database\Seeders;

use App\Models\city;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $cities = city::factory()->count(10)->create();
        $cities->each(function($city){
            Student::factory(5)->create([
                "studentCity" => $city->id,
            ]);
        });

        $cities->each(function($city){
            Lecturer::factory(5)->create([
                "lecturerCityId" => $city->id,
            ]);
        });
        
    }
}
