<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show(){
        echo "<pre>";
        print_r(session()->all());
        echo "</pre>";
    }
    public function insert(Request $request){
        session(["name", "Haseeb Yousaf"]);
        $request->session()->put("class", "BS IT");
        session()->flash("message", "Session Created!");
        return view("welcome");
    }
    public function delete(){
        session()->flush();
        return redirect("/");
    }
}
