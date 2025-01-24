<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $admins = Admin::find(4);
        // return $admins->roles;

        $admins = Admin::get();
        // return $admins;
        foreach ($admins as $admin) {
            echo $admin->name . "<br>";
            foreach ($admin->roles as $role) {
                echo $role->adminRole . "<br>";
            }
            echo "<hr>";
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $admin = Admin::find(1);
        // $admin->roles()->attach([3,4]);

        // $admin = Admin::find(1);
        // $admin->roles()->detach();

        $admin = Admin::find(1);
        $admin->roles()->sync([2,3]);
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
