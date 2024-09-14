<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;  // Import model Car
use App\Models\Order;  // Import model Car
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Lấy tất cả xe từ database
        $cars = Car::paginate(8);

        // Truyền danh sách xe vào view
        return view('frontend.homepage', compact('cars'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function detail($id)
    {
        // Tìm chiếc xe dựa vào ID
        $car = Car::find($id);

        // Nếu không tìm thấy xe, có thể redirect hoặc hiển thị thông báo lỗi
        if (!$car) {
            return redirect()->back()->with('error', 'Car not found.');
        }

        // Truyền thông tin của xe vào view
        return view('frontend.detail', compact('car'));

        // for "Book now" button
        $car = Car::findOrFail($id);
        $user = Auth::user();
        return view('frontend.detail', compact('car', 'user'));
    }

    public function confirmation()
    {
        // Giả sử người dùng chỉ có 1 đơn hàng đang được xử lý (trạng thái 'in process')
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('status', 'in process')->first();

        // Kiểm tra xem có đơn hàng đang xử lý hay không
        if (!$order) {
            return redirect()->back()->with('error', 'No order found or the order has already been processed.');
        }

        return view('frontend.confirmation', compact('order'));
    }


    public function checkOrderStatus($order_id)
    {
        $order = Order::findOrFail($order_id);
        return response()->json(['status' => $order->status]);
    }
}
