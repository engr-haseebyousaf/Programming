<?php

use Illuminate\Support\Facades\Route;

function usersInfo(){
    return array(
        1 => [
            "name" => "Haseeb Yousaf",
            "age" => 34,
            "phone" => "0312 7216337"
        ],
        2 => [
            "name" => "Sami Yousaf",
            "age" => 54,
            "phone" => "0312 7200337"
        ],
        3 => [
            "name" => "Mohsin Yousaf",
            "age" => 12,
            "phone" => "0312 7111117"
        ],
        4 => [
            "name" => "Asad Yousaf",
            "age" => 12,
            "phone" => "0200 7216337"
        ]
    );
}

Route::get('/', function () {
    return view('welcome');
});
Route::get("/editors", function(){
    $name = "Haseeb Yousaf";
    $age = 24;
    return view("editors", ["name" => $name, "age" => $age]);
});

Route::get("/composers", function(){
    $name = "Sami Yousaf";
    $age = "12";
    return view("composers")->with("name", $name)->with("age", $age);
});

Route::get("/admins", function(){
    $name = "Mohsin Yousaf";
    $age = 12;
    return view("admin")->withName($name)->withAge($age);
});

Route::get("/users", function(){
    $users = usersInfo();
    return view("users")->withUsers($users);
});

Route::get("/user/{id}", function($id){
    $users = usersInfo();
    $user = $users[$id];
    abort_if(!isset($id), 404);
    return view("user", ["user" => $user]);
});