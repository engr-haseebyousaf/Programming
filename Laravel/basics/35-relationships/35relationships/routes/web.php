<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\StudentContact;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("students", StudentController::class);
Route::resource("contact", StudentContact::class);

Route::resource("user", UserController::class);

Route::resource("owner", OwnerController::class);
Route::resource("phone", PhoneController::class);

Route::resource("admin", AdminController::class);
Route::resource("role", RoleController::class);