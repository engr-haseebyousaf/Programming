<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Student extends Controller
{
    public function showStudents(){
        // $students = DB::table("students")
        // ->join("cities", "students.studentCity", "=", "cities.cityId")
        // ->select(DB::raw("count(*) AS students_count"), "cities.city")
        // ->groupBy("city")
        // ->orderBy("city", "desc")
        // ->having("students_count", "<" , 5)
        // ->get();
        // return $students;
        // return view("welcome", compact("students"));

        // $students = DB::table("students")
        // ->join("cities", "students.studentCity", "=", "cities.cityId")
        // ->select(DB::raw("count(*) AS students_count"), "cities.city")
        // ->groupBy("city")
        // ->orderBy("city", "desc")
        // ->havingBetween("students_count", [3,4])
        // ->get();
        // return $students;

        // $students = DB::table("students")
        // ->leftJoin("cities", "students.studentCity", "=", "cities.cityId")
        // ->get();
        // return $students;

        // $students = DB::table("students")
        // ->rightJoin("cities", "students.studentCity", "=", "cities.cityId")
        // ->get();
        // return $students;

        $students = DB::table("students")
        ->leftJoin("cities", function(JoinClause $joinClause){
            $joinClause
            ->on("students.studentCity", "=", "cities.cityId");
        })
        ->get();
        return $students;
    }
}
