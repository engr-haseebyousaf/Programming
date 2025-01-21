<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function showStudents(){
        $students = DB::table("students")
        ->paginate(5);
        return view("allStudents", ["data"=> $students]);
    }

    public function singleStudent($id){
        $student = DB::table("students")->where("studentId","=",$id)->get();
        return view("singleStudent", ["data" => $student]);
    }

    public function addStudent(Request $request){
        $student = DB::table("students")
        ->insert(
            [
            "name" => $request->studentName,
            "email" => $request->studentEmail,
            "phone" => $request->studentPhone,
            "age" => $request->studentAge,
        ]
    );
        if ($student) {
            return redirect()->route("home");
        } else {
            echo "<h1>Could not Added</h1>";
        }
    }

    public function updateStudent(Request $request, $id){
        $student = DB::table("students")->where("studentId", $id)->update(
            [
                "name" => $request->studentName,
                "age" => $request->studentAge,
                "email" => $request->studentEmail,
                "phone" => $request->studentPhone
            ]
        );
        if ($student) {
            return redirect()->route("home");
        } else {
            return "<h1>Could Not Updated</h1>";
        }
    }

    public function updatePage($id){
        $student = DB::table("students")->where("studentId",$id)->get();
        return view("updateStudent", ["data" => $student]);
    }

    public function deleteStudent($id){
        $student = DB::table("students")
        ->where("studentId", $id)
        ->delete();
        if ($student) {
            return redirect()->route("home");
        }
    }
    
}
