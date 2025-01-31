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
            "age" => "required|numeric|gte:18",
            "role" => "required"
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
            return redirect()->route("dashboard");
        } else {
            return back()->withErrors(["email"=>"Invalid Credentials"]);
        }
    }

    public function innerPage(){
        return view("innerPage");
    }

    public function dashboard(){
        return view("dashboard");
        
    }

    public function logout(){
        Auth::logout();
        return redirect()->route("login");
    }
}
