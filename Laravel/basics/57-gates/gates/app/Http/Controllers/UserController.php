<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);
        if (Auth::attempt($credentials)) {
            return redirect()->route("dashboard");
        } else {
            return back()->with("error", "Failed to login");
        }
    }

    public function registerUser(Request $request){
        $credentials = $request->validate([
            "name" => "required",
            "email" => "required|email",
            "age" => "required|integer",
            "role" => "required|in:admin,writer,editor,subscriber",
            "password" => "required"
        ]);
        User::create($credentials);
        return redirect()->route("login");
    }

    public function dashboard(){
        // Gate::authorize("isAdmin");
        
        return view("dashboard");

        // if (Gate::allows("isAdmin")) {
        //     return view("dashboard");
        // } else {
        //     return "<h2>Access Denies</h2>";
        // }
    }

    public function profile(int $id){
        if (Gate::allows("isAdminValid", $id)) {
            $user = User::findOrFail($id);
            return view("profile", compact("user"));
        } else {
            return redirect()->route("dashboard");
        }
        
    }

    public function logout(){
        Auth::logout();
        return redirect()->route("login");
    }
}
