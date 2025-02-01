<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::controller(TestController::class)->group(function(){
    Route::get('/', "show")->name("show");
    
    Route::get("/insert", "insert")->name("insert");

    Route::get("delete", "delete")->name("delete");
});