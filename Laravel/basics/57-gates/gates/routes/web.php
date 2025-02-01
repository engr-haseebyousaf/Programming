<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;

Route::get("/", function(){
    return view("welcome");
});
Route::get('/login', function () {
    return view('login');
})->name("login");

Route::get("register", function(){
    return view("register");
})->name("register");

Route::post("registerUser", [UserController::class, "registerUser"])
->name("registerUser");

Route::get("loginrequest", [UserController::class, "login"])
->name("loginRequest");

Route::get("dashboard", [UserController::class, "dashboard"])
->name("dashboard")
->middleware(CheckAuth::class);

Route::get("profile/{id}", [UserController::class, "profile"])
->name("profile")
->middleware(CheckAuth::class);

Route::get("posts/{id}", [PostController::class, "posts"])
->name("posts")
->middleware(CheckAuth::class)
// ->middleware("can:isAdmin")
->can("isAdmin");

Route::get("logout", [UserController::class, "logout"])
->name("logout")
->middleware(CheckAuth::class);

Route::get("back", function(){
    return back();
})
->name("back")
->middleware(CheckAuth::class);