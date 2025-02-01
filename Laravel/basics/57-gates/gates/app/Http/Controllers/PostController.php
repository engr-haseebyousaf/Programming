<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function posts(int $id){
        if (Gate::allows("isPostValid", $id)) {
            $posts = Post::where("user_id","=",$id)->get();
            return view("posts", compact("posts"));
        } else {
            return redirect()->route("dashboard");
        }
    }
}
