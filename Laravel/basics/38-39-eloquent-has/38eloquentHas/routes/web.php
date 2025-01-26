<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("users", UserController::class);
Route::view("error", "errors/layout");

Route::resource("customer", CustomerController::class);

Route::resource("country", CountryController::class);