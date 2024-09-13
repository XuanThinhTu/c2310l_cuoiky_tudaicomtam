<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Display all orders for the admin
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }

    // Store a new order
    public function store(Request $request)
    {
        $user = Auth::user();

        // Check if the user's age is under 18
        if ($user->age < 18) {
            return redirect()->back()->with('error', 'You must be 18 or older to place an order.');
        }

        // Create the order with "in process" status
        $order = Order::create([
            'user_id' => $user->id,
            'car_id' => $request->car_id,
            'time' => $request->time,
            'date' => $request->date,
            'price' => $request->price,
            'status' => 'in process',
        ]);

        return redirect()->route('orders.confirmation')->with('success', 'Your order is being processed.');
    }

    // Order confirmation view
    public function confirmation()
    {
        return view('frontend.confirmation');
    }

    // Update order status (admin only)
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        // If approved, mark the car as unavailable
        if ($order->status === 'approved') {
            $car = Car::find($order->car_id);
            $car->isAvailable = 0;
            $car->save();
        }

        return redirect()->route('admin.orders')->with('status', 'Order updated successfully.');
    }
}
