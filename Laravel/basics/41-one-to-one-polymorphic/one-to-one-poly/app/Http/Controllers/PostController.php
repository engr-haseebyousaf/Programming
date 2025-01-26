<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $post = Post::with("image")->find(1);
        // return $post;

        // $post = Post::find(1);
        // return $post;

        $post = Post::find(1);
        return $post->image;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = Post::create([
            "title" => "Post Three",
            "Description" => "This is the post three"
        ]);
        $post->image()->create([
            "url" => "images/posts/post3.png"
        ]);
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
