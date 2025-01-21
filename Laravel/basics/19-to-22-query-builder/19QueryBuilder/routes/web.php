<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::controller(StudentController::class)->group(function(){
    Route::get("/",  "showStudents")->name("home");
    Route::get("student/{id}",  "singleStudent")->name("view.student");
    Route::post("/add",  "addStudent")->name("addStudent");
    Route::post("/updateStudent/{id}",  "updateStudent")->name("student.update");
    Route::get("/updatePage/{id}",  "updatePage")->name("page.update");
    Route::get("/delete/{id}",  "deleteStudent")->name("view.delete");

});
Route::view("/newStudent", "addStudent")->name("student.add");
