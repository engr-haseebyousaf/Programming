<?php

namespace App\Http\Controllers;

use App\Rules\UpperCase;
use Illuminate\Support\Facades\Validator;
use Closure;
use Illuminate\Http\Request;

class NewUserController extends Controller
{
    public function addNewUser(Request $request){
        $validate = $request->validate([
            // "newUserName" => ["required",new UpperCase],
            "newUserName" => ["required",
            function(string $attribute, mixed $value, Closure $fail){
                if(strtoupper($value) !== $value){
                    $fail("The :attribute must be in Upper Case");
                }
            }
        ],
            "newUserEmail" => "required|email"
        ]);
        return $request->all();
    }
}
