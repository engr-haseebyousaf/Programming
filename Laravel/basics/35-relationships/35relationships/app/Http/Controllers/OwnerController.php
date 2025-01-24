<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use App\Models\Owner;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $owners = Owner::with("phone")->get();
        // return $owners;

        // $owners = Owner::has("phone")->get();
        // return $owners;

        // $owners = Owner::has("phone","<", 4)->with("phone")->get();
        // return $owners;

        $owners = Owner::withCount("phone")->with("phone")->get();
        return $owners;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $phone = new Phone([
            "model" => "testing model",
            "description" => "Just Testing..."
        ]);
        $owner = Owner::find(1);
        $owner->phone()->save($phone);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
