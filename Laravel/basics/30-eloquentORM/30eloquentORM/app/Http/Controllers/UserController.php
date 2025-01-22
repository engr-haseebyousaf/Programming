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
        $request->validate([
            "updateUserName" => "required|string",
            "addUserEmail" => "required|email",
            "addUserAge" => "required|numeric",
            "addUserCity" => "required|alpha"
        ]);
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
        ->with("status", "Successfully Inserted ".$request->addUserName." !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userData = User::findOrFail($id);
        return view("viewUser", compact("userData"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view("updateUser", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            "updateUserName" => "required|string",
            "updateUserEmail" => "required|email",
            "updateUserAge" => "required|numeric",
            "updateUserCity" => "required|alpha"
        ]);

        // $user = User::find($id);
        // $user->name = $request->updateUserName;
        // $user->email = $request->updateUserEmail;
        // $user->age = $request->updateUserAge;
        // $user->city = $request->updateUserCity;
        // $user->save();

        $user = User::find($id)
                ->update([
                    "name" => $request->updateUserName,
                    "email" => $request->updateUserEmail,
                    "age" => $request->updateUserAge,
                    "city" => $request->updateUserCity
                ]);

        return redirect()
        ->route("user.index")
        ->with("status", "Successfully Updated ".$request->updateUserName."!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()
        ->route("user.index")
        ->with("status", "Successfully Deleted !");
    }
}
