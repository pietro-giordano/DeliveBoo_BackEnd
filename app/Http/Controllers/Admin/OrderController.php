<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

// Model
use App\Models\Order;
use App\Models\Dish;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurantId = auth()->user()->restaurant->id;
        $dishes = Dish::where('restaurant_id', $restaurantId)->get();

        $orders = Order::whereHas('dishes', function ($query) use ($restaurantId) {
            $query->where('restaurant_id', $restaurantId);
        })->with(['dishes' => function ($query) {
            $query->withPivot('quantity');                 // trucco per pescare anche quantity
        }])->orderBy('created_at', 'desc')->get();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $restaurant_id = $order->dishes()->first()->restaurant_id;
        if ($restaurant_id != auth()->user()->restaurant->id) {
            abort(403, 'Unauthorized action.');
        }

        $orderDetails = $order->dishes()->withPivot('quantity')->get();

        return view('admin.orders.show', compact('order', 'orderDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
