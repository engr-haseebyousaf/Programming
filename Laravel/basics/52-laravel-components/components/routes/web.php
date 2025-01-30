<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::view("card", "card");

Route::view("dynamic", "dynamicComponent");

Route::view("form", "forms");