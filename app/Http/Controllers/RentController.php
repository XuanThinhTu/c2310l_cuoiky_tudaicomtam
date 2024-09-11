<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Car;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class RentController extends BaseController
{
    public function index()
    {
        // Lấy tất cả xe từ database
        $cars = Car::All();

        // Truyền danh sách xe vào view
        return view('frontend.rent', compact('cars'));
    }

    public function showRentForm($id){

    }

    public function submitRentalForm(Request $request, $id)
    {
        // Validate dữ liệu người mượn xe
        $request->validate([
            'name' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:thongtinnguoimuonxe,username',
            'password' => 'required|string|min:6',
            'phonenumber' => 'required|string|max:15',
            'birth' => 'required|date',
            'CCCD' => 'required|string|max:12|unique:thongtinnguoimuonxe,CCCD',
            'license' => 'required|string|max:50',
        ]);

        // Lưu thông tin người mượn xe vào bảng thongtinnguoimuonxe
        $ThongTinTaiXe = Driver::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),  // Mã hóa password
            'phonenumber' => $request->phonenumber,
            'birth' => $request->birth,
            'CCCD' => $request->CCCD,
            'license' => $request->license,
        ]);

        // Sau khi lưu thành công, có thể cập nhật trạng thái xe hoặc thực hiện logic khác
        $car = Car::findOrFail($id);
        $car->isAvailable = false;  // Cập nhật xe không còn sẵn sàng cho thuê
        $car->save();

        // Chuyển hướng tới trang thành công hoặc làm gì đó
        return redirect()->route('rent.car.success')->with('success', 'Car rented successfully!');
    }
}
