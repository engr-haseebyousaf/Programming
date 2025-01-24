<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Student;
use App\Models\StudentContact;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Student::factory(10)->has(StudentContact::factory())->create();

        // Step 1: Create 50 students
        $students = Student::factory(10)->create();

        // Step 2: Create 50 student contacts, linking each to a random student
        foreach ($students as $student) {
            StudentContact::factory()->create([
                'studentTableId' => $student->studentId, // Use the student's ID
            ]);
        }

        $user = User::factory(10)->create();
        $user->each(function(){
            Post::factory(2)->create();
        });
    }
}
