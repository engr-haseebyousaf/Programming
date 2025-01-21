<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function unionTable(){
        // $lecturers = DB::table("lecturers")
        // ->select("name", "email", "city")
        // ->join("cities","lecturers.lecturerCityId", "=", "cities.cityId");

        // $students = DB::table("students")
        // ->union($lecturers)
        // ->select("name", "email", "city")
        // ->join("cities", "students.studentCity", "=", "cities.cityId")
        // ->get();

        // return $students;


        $lecturers = DB::table("lecturers")
        ->select("name", "email", "city")
        ->join("cities","lecturers.lecturerCityId", "=", "cities.cityId");

        $students = DB::table("students")
        ->union($lecturers)
        ->select("name", "email", "city")
        ->join("cities", "students.studentCity", "=", "cities.cityId")
        ->toSql();

        return $students;
    }

    public function whenTable(){
        $students = DB::table("students")
        ->when(
            false,
            function($query){
                $query->where("name", "=", "Marilie Orn");
        },
    function($query){
        $query->where("name", "=", "Ms. Lily Morar V");
    })
    ->get();
    return $students;
    }

    public function chunkTable(){
        $lecturers = DB::table("lecturers")
        ->orderBy("lecturerId")
        ->chunk(3, function($lecturers_chunk){
            echo "<div style='margin-bottom:10px; border:1px solid red'>";
            foreach ($lecturers_chunk as $key => $value) {
                echo $value->name . "<br>";
            }
            echo "</div>";
        });
    }
}
