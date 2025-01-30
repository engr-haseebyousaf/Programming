<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registerUser(Request $request){
        $credentials = $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "password" => "required|confirmed",
        ]);
        $user = User::create($credentials);
        if ($user) {
            return redirect()->route("login");
        }
    }

    public function checkLogon(Request $request){
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        if (Auth::attempt($credentials)) {
            if (Auth::user()) {
                return view("dashboard");
            } else {
                return redirect()->route("login");
            }
        }
    }

    public function innerPage(){
        if (Auth::user()) {
            return view("innerPage");
        } else {
            return redirect()->route("login");
        }
    }
}
