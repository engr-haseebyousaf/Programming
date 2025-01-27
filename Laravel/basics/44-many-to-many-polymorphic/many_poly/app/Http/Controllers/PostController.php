<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with("tags")->get();
        // return $posts;
        foreach ($posts as  $post) {
            echo "<h2>$post->title</h2>";
            echo "<h4>$post->description</h4>";
            foreach ($post->tags as $tag) {
                echo $tag->body . " / ";
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $post = Post::create([
        //     "title" => "Lorem ipsum dolor sit amet.",
        //     "description" => "lorem ipsum dolor sit amet. lorem ipsum dolor sit amet."
        // ]);
        // $post->tags()->create([
        //     "body" => "This is the hashtag of third post"
        // ]);

        $post = Post::find(1);
        $post->tags()->attach([2,3]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
