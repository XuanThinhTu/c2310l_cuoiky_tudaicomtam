<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon; 
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'string', 'in:male,female,other'], // Giới tính phải là male, female hoặc other
            'phonenumber' => ['required', 'string', 'regex:/^[0-9]{10,15}$/'], // Số điện thoại phải là chuỗi số từ 10 đến 15 chữ số
            'birth' => ['required', 'date', 'before:today'], // Ngày sinh phải là ngày trước hiện tại
            'citizen_identification_card' => ['required', 'string', 'size:12'], // Căn cước công dân phải đủ 12 ký tự
            'driver_license' => ['required', 'string', 'size:12'], // Bằng lái xe phải đủ 12 ký tự
            'isAdmin' => ['string'], // Trường isAdmin phải là kiểu boolean (true hoặc false)
        ]);
        
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        $isAdmin = filter_var($data['isAdmin'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? false;
        $birthDate = Carbon::parse($data['birth'])->format('Y-m-d');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'phonenumber' => $data['phonenumber'],
            'birth' => $birthDate, // Lưu giá trị ngày sinh đã chuyển đổi
            'citizen_identification_card' => $data['citizen_identification_card'],
            'driver_license' => $data['driver_license'],
            'isAdmin' => $isAdmin,
        ]);
    }

}
