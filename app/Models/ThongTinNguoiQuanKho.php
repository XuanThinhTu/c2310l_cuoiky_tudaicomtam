<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongTinNguoiQuanKho extends Model
{
    use HasFactory;

    // Tên bảng trong cơ sở dữ liệu
    protected $table = 'thongtinnguoiquankho';

    // Các cột có thể được gán hàng loạt (mass-assignable)
    protected $fillable = [
        'name',
        'username',
        'password',
        'description',
        'role',
    ];

    // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bcrypt($value);
    // }
}
