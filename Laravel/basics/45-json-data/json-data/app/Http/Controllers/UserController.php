<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy("json_data->name")->get();
        return $user;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $user = new User;
        // $user->json_data = [
        //     "name" => "Haseeb Yousaf", 
        //     "email" => "haseebyousaf@gmail.com",
        //     "contact" => "0313-73164589"
        // ];
        // $user->save();
        // return $user;

        // $user = User::create([
        //     "json_data" => [
        //         "name" => "Asad Yousaf",
        //         "email" => "asadyousaf@gmail.com",
        //         "contact" => "0300-000000000",
        //         "address" => [
        //             "street" => "hljaj",
        //             "mohala" => "abc"
        //         ]
        //     ]
        // ]);
        // return $user;

        // $user = User::where("id", 2)->update([
        //     "json_data" => [
        //         "name" => "Sakhi Server",
        //         "email" => "sakhi@gmail.com",
        //         "contact" => "0231-3698521"
        //     ]
        // ]);
        // return $user;

        $user = User::find(4);
        $user->json_data = collect($user->json_data)->forget("address");
        return $user;
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
