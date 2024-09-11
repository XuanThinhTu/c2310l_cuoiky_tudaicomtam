<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Tên bảng trong cơ sở dữ liệu (nên viết theo chuẩn snake_case)
    protected $table = 'orders'; // Lưu ý bảng thường nên viết thường và dạng số nhiều

    // Các cột có thể được gán hàng loạt (mass-assignable)
    protected $fillable = [
        'time',           // Thời gian (INT)
        'date',           // Ngày (DATE)
        'driver_name',    // Tên tài xế
        'price',          // Giá
        'xe_description', // Mô tả xe
        'manager_name',   // Tên quản lý
        'status',         // Trạng thái (done, cancel)
        'driver_id',      // Khóa ngoại tài xế
        'car_id',         // Khóa ngoại xe
        'manager_id',     // Khóa ngoại quản lý
    ];

    // Thiết lập quan hệ khóa ngoại với bảng ThongTinTaiXe
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    // Thiết lập quan hệ khóa ngoại với bảng ThongTinXe
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    // Thiết lập quan hệ khóa ngoại với bảng ThongTinNguoiQuanKho
    public function manager()
    {
        return $this->belongsTo(ThongTinNguoiQuanKho::class, 'manager_id');
    }
}
