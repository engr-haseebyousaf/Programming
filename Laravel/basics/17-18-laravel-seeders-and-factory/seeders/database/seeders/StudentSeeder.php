<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\student;
use Illuminate\support\Facades\File;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $json = File::get(path:"database\json\students.json");
        $students = collect(json_decode($json));
        $students->each(function($student){
            student::create([
                "name" => $student->name,
                "email" => $student->email,
                "age" => $student->age
            ]);
        });


        /*
        $students = collect(
            [
                [
                    "name" => "Haseeb Yousaf",
                    "email" => "haseeb@gmail.com",
                    "age" => 24
                ],
                [
                    "name" => "Sami Yousaf",
                    "email" => "sami@gmail.com",
                    "age" => 22
                ],
                [
                    "name" => "Mohsin Yousaf",
                    "email" => "mohsin@gmail.com",
                    "age" => 12
                ]
            ]
        );
        $students->each(function($student){
            student::insert($student);
        }); */


        // student::create([
        //     "name" => "Haseeb Yousaf",
        //     "email" => "haseebyousaf2000@gmail.com",
        //     "age" => 20
        // ]);
    }
}
