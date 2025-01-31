<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\TestUser;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front');
});

// Route::controller(UserController::class)->group(function(){
//     Route::middleware([ValidUser::class, TestUser::class])->group(function(){
//         Route::view("register", "register")->name("register");
//         Route::view("login", "login")->name("login");
//         Route::put("register", "registerUser")->name("registerUser");
//         Route::post("logon", "checkLogon")->name("checkLogon");
//         Route::get("dashboard", "dashboard")->name("dashboard");
//         Route::get("dashboard/inner", "innerPage")->name("innerPage")->withoutMiddleware([TestUser::class]);
//         Route::get("logout", "logout")->name("logout");
//     });
// });

// Route::controller(UserController::class)->group(function(){
//     Route::middleware(["validates"])->group(function(){
//         Route::view("register", "register")->name("register");
//         Route::view("login", "login")->name("login");
//         Route::put("register", "registerUser")->name("registerUser");
//         Route::post("logon", "checkLogon")->name("checkLogon");
//         Route::get("dashboard", "dashboard")->name("dashboard");
//         Route::get("dashboard/inner", "innerPage")->name("innerPage")->withoutMiddleware([TestUser::class]);
//         Route::get("logout", "logout")->name("logout");
//     });
// });

// Route::controller(UserController::class)->group(function(){
    // Route::middleware(["validates"])->group(function(){
    //     Route::view("register", "register")->name("register");
    //     Route::view("login", "login")->name("login");
    //     Route::put("register", "registerUser")->name("registerUser");
    //     Route::post("logon", "checkLogon")->name("checkLogon");
    //     Route::get("dashboard", "dashboard")->name("dashboard");
    //     Route::get("dashboard/inner", "innerPage")->name("innerPage")->withoutMiddleware([TestUser::class]);
    //     Route::get("logout", "logout")->name("logout");
    // });


// });


Route::controller(UserController::class)->group(function(){
    Route::view("register", "register")->name("register");
    Route::view("login", "login")->name("login");
    Route::put("register", "registerUser")->name("registerUser");
    Route::post("logon", "checkLogon")->name("checkLogon");
    Route::get("dashboard/inner", "innerPage")->name("innerPage")->withoutMiddleware([TestUser::class]);
    Route::get("logout", "logout")->name("logout");
    Route::get("dashboard", "dashboard")->name("dashboard")->middleware(ValidUser::class.":admin,writer");

});