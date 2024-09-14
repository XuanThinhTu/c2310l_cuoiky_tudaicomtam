<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        // Lấy tất cả xe từ database
        $cars = Car::All();

        // Truyền danh sách xe vào view
        return view('admin.carList', compact('cars'));
    }
    public function handleAction(Request $request) {   
        $id = $request->input('id'); //lấy id xe cần update
        $action = $request->input('Action'); // trạng thái
        $cars = $request-> cars;

        if ($action === 'Update') {
            foreach ($cars as $id => $car_update) { //duyệt mảng cars từ request với id là key của mảng và car_update là value
                $car = Car::find($id);

                if ($car) {
                    // Các thuộc tính khác
                    $car->name = $car_update['name'];
                    $car->brand = $car_update['brand'];
                    $car->description = $car_update['description'];
                    
                    // Xử lý giá trị price
                    $price = str_replace(',', '', $car_update['price']); // Loại bỏ dấu phân cách hàng nghìn
                    $price = $price !== '' ? $price : 0; // Gán giá trị mặc định nếu rỗng
                    $car->price = number_format((float)$price, 2, '.', ''); // Đảm bảo định dạng số thập phân
                    $car->isAvailable = filter_var($car_update['isAvailable'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ? 1 : 0;    
                    // Chuyển giá trị 'true' và 'false' thành 1 và 0
                    $car->image = $car_update['image'];
                    $car->seats = $car_update['seats'];       

                    // Lưu lại
                    $car->save();
                }
            }
        
            return redirect()->route(route: 'admin.carList')->with('success', 'Cập nhật thông tin xe thành công.');

        }            
        
        elseif ($action === 'Delete') {
            foreach ($cars as $id => $car_update) {
                $car = Car::find($id);
    
                if ($car) {
                    // Xóa xe
                    $car->delete();
                }
            }
    
            return redirect()->route('admin.carList')->with('success', 'Xóa thông tin xe thành công.');
        }

        elseif ($action === 'Create') {
            // Lấy thông tin xe mới từ request
            $newCarData = $request->input('new_car');
            
            // Tạo mới và lưu thông tin xe
            $car = new Car();
            $car->name = $newCarData['name'];
            $car->brand = $newCarData['brand'];
            $car->description = $newCarData['description'];
            $car->price = str_replace(',', '', $newCarData['price']); // Loại bỏ dấu phân cách hàng nghìn
            $car->price = $car->price !== '' ? $car->price : 0; // Gán giá trị mặc định nếu rỗng
            $car->price = number_format((float)$car->price, 2, '.', ''); // Đảm bảo định dạng số thập phân
            $car->image = $newCarData['image'];
            $car->seats = $newCarData['seats'];
            $car->isAvailable = filter_var($newCarData['isAvailable'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ? 1 : 0; // Chuyển giá trị 'true' và 'false' thành 1 và 0
    
            // Lưu xe mới
            $car->save();
    
            return redirect()->route('admin.carList')->with('success', 'Thêm xe mới thành công.');
        }
    
        return redirect()->route('admin.carList')->with('error', 'Hành động không hợp lệ.');
    }
    
    
}
