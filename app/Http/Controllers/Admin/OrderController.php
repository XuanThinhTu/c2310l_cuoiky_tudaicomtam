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
        // // Lấy tất cả các đơn hàng đang trong trạng thái 'in process'
        // $orders = Order::where('status', 'in process')->get();

        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }

    // Store a new order
    public function store(Request $request)
    {
        $user = Auth::user();

        // Validate the incoming request
        $request->validate([
            'time' => 'required|date_format:H:i', // Time must be in the correct format
            'date' => 'required|date', // Date must be a valid date
        ]);

        // Create the order
        $order = Order::create([
            'user_id' => $user->id,
            'car_id' => $request->car_id,
            'time' => $request->time,
            'date' => $request->date,
            'price' => $request->price,
            'status' => 'in process',
        ]);

        return redirect()->route('frontend.confirmation')
            ->with('status', 'Your booking is being processed. Please wait for admin confirmation.');
    }


    // Order confirmation view
    public function confirmation()
    {
        return view('frontend.confirmation');
    }

    // Update order status (admin only)
    // OrderController.php

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

        // Add a flash message to notify the user about the status change
        $user = $order->user; // Assuming you have a relationship between Order and User
        $message = 'Your order has been ' . $order->status;
        session()->flash('status', $message);

        return redirect()->route('admin.orders')->with('status', 'Order updated successfully.');
    }
}
