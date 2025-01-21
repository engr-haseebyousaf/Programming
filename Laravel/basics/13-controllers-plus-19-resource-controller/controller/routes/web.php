<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\PageController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get("/", [PageController::class, "userC"]);
Route::get("/user", [UserController::class, "user"]);
// Route::resource("students", StudentController::class)->only([
//     "index", "create"
// ]);

// Route::resource("students", StudentController::class)->names([
//     "create" => "students.done",
//     "store" => "students.warehouse"
// ]);

// Route::resources([
//     "students" => StudentController::class,
//     "students.comments" => CommentController::class
// ]);

Route::resource("students", StudentController::class);
Route::resource("students.comments", CommentController::class)->shallow();
