<?php

use App\Http\Controllers\NewUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view("/", "addUser");

Route::post("/adduser", [UserController::class, "addUser"])
->name("addUser");

Route::view("/newuser", "newUser")->name("newUser");
Route::post("/add", [NewUserController::class, "addNewUser"])->name("addNewUser");