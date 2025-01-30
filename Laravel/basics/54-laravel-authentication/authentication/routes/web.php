<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('register');
// });

Route::controller(UserController::class)->group(function(){
    Route::view("/", "register")->name("register");
    Route::view("login", "login")->name("login");
    Route::put("register", "registerUser")->name("registerUser");
    Route::post("logon", "checkLogon")->name("checkLogon");
    Route::get("dashboard/inner", "innerPage")->name("innerPage");
    
});