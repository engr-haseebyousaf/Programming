<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $customer = Customer::get();
        // return $customer;

        // $customer = Customer::with("latestOrder")->find(1);
        // return $customer;

        // $customer = Customer::with("oldestOrder")->find(1);
        // return $customer;

        // $customer = Customer::with("largestOrder")->find(1);
        // return $customer;

        $customer = Customer::
        with("order")
        ->with("smallestOrder")->find(1);
        return $customer;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customer = Customer::find(1);
        $id = $customer->id;
        // return $id;
        Order::create([
            "amount" => 2000.0,
            "customer_id" => $id
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
