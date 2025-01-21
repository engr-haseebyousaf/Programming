<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        // return $users;
        return view("home", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("addUser");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $user = new User;
        // $user->name = $request->addUserName;
        // $user->email = $request->addUserEmail;
        // $user->age = $request->addUserAge;
        // $user->city = $request->addUserCity;
        // $user->save();

        User::create([
            "name" => $request->addUserName,
            "email" => $request->addUserEmail,
            "age" => $request->addUserAge,
            "city" => $request->addUserCity
        ]);

        return redirect()
        ->route("user.index")
        ->with("addStatus", "Successfully Inserted ".$request->addUserName." !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userData = User::find($id);
        return view("viewUser", compact("userData"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view("updateUser", compact("user"));
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
