<?php

use App\Http\Controllers\LecturerController;
use App\Http\Controllers\Student;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [Student::class, "showStudents"]);
Route::get("/union", [LecturerController::class, "unionTable"]);
Route::get("/when", [LecturerController::class, "whenTable"]);
Route::get("/chunk", [LecturerController::class, "chunkTable"]);


// raw SQL routing
Route::get("/rawsql", [StudentController::class, "rawSQL"]);