<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $video = Video::with("comment")->find(1);
        // // return $video;
        // echo "<h1>$video->title</h1>";
        // echo "<h4>$video->url</h4>";
        // foreach ($video->comment as $key => $value) {
        //     echo "<p>$value->detail</p>";
        //     echo "<p>$value->commentable_type</p>";
        // }

        // $video = Video::with("oldestComment")->find(1);
        // return $video;

        // $video = Video::with("latestComment")->find(1);
        // return $video;

        // $video = Video::with("bestComment")->find(1);
        // return $video;

        $video = Video::with("worstComment")->find(1);
        return $video;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $video = Video::create([
            "title" => "video three",
            "url" => "videos/cources/video_three.mp4"
        ]);
        return $video;
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
