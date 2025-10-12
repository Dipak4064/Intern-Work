<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
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
        $orders = [
            ['customer_id' => 5, 'product_number' => 'A001', 'amount' => '20000', 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 5, 'product_number' => 'A002', 'amount' => '30000', 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' =>7, 'product_number' => 'A003', 'amount' => '40000', 'created_at' => now(), 'updated_at' => now()]
        ];
        foreach ($orders as $order) {
            Order::create($order);
        }
        return "success";
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
