<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user(){
        return "<h2>Hello, I am the user</h2>";
    }
}
