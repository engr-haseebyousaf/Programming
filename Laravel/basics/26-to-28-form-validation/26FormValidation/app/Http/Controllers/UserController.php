<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUser(UserRequest $request){
    //     $request->validate([
    //         "userName" => "required",
    //         "userEmail" => "required|email:rfc,dns",
    //         "userAge" => "required|integer",
    //         "userCity" => "required"
    //     ],
    // [
    //     "userName.required" => "User Name validation from specific form",
    //     "userEmail.required" => "User E-mail validation through controller for unique form",
    //     "userEmail.email" => "User E-mail validation through controller for unique form. Email must be correct email",
    //     "userAge.required" => "User Age validation through controller for unique form",
    //     "userCity.required" => "User City validation through controller for unique form",
    //     "userAge.integer" => "User Age validation through controller for unique form. Age must be correct number",
    // ]);


        // return $request->all();
        // return $request->only(["userName"]);
        return $request->except(["userName"]);
    }
}
