<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Order; // Ensure this model exists
use App\Http\Controllers\Controller;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'car'])->get(); // Eager load relationships
        return view('admin.orders', compact('orders'));
    }
}
