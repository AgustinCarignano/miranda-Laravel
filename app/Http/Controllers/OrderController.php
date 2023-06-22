<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all()->where('user_id', Auth::user()->id);
        $rooms = Room::all();
        return view('orders', ['orders' => $orders, 'rooms' => $rooms]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        // $orderId = +request('orderId');
        // if ($orderId) {
        //     $order = Order::find($orderId);
        //     $newOrder = $order->replicate();
        //     $newOrder->save();
        //     return back()->with('success', 'order sent');
        // }
        $validateData = $request->validate([
            'type' => 'required',
            'description' => 'required',
            'room_id' => 'required'
        ]);
        Order::create(['user_id' => Auth::user()->id, ...$validateData]);
        return back()->with('success', 'order sent');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request)
    {
        $validateData = $request->validate([
            'type' => 'required',
            'description' => 'required',
            'room_id' => 'required'
        ]);
        $orderId = request('orderId');
        Order::where('id', $orderId)->update($validateData);
        return back()->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $orderId = +request('orderId');
        Order::destroy($orderId);
        return back();
    }
}
