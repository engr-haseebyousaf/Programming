<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        return view("user_form", compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            "userImage" => "required|image|mimes:png,jpg"
        ]);
        $filePath = $request->file("userImage")->store("uploads", "public");
        $user = User::create([
            "file_path" => $filePath
        ]);
        return back()->with("success", "Successfully Uploaded file");
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
        $user = User::select("file_path", "id")->find($id);
        return view("updateUser", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->hasFile("userImage")) {
            $request->validate([
                "userImage" => "image|mimes:png,jpg"
            ]);
            $user = User::find($id);
            $oldPath = public_path("storage/") . $user->file_path;
            $filePath = $request->file("userImage")->store("uploads", "public");
            $user->update([
                "file_path" => $filePath,
                "updated_at" => now()
            ]);

            if (file_exists($oldPath)) {
                @unlink($oldPath);
            }
            return redirect()->route("user.create")->with("success", "Successfully Updated User");
        }
        return redirect()->route("user.create");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        $filePath = public_path("storage/" . $user->file_path);
        if (file_exists($filePath)) {
            @unlink($filePath);
        }
        return back()->with("success", "Deleted Successfully");
    }
}
