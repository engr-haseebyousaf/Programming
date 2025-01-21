<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function rawSQL(){
        // $students = DB::select("select * from `students` where `studentId` = ?", [2]);
        // return $students;

        // $students = DB::insert("insert into `students` (`name`, `email`, `studentCity`) values (?, ?, ?)", ['Haseeb Yousaf', 'haseebyousaf@gmail.com', 3]);
        // return $students;

        // $students = DB::update("update `students` set `email` = ? where `studentId` = ?", ["haseeb@gmail.com", 2]);
        // return $students;

        $students = DB::delete("delete from `students` where `studentId` = ?", [3]);
        return $students;
    }
}
