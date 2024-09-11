<?php
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('/contact', [\App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/detail/{id}', [\App\Http\Controllers\HomeController::class, 'detail'])->name('detail');

Route::get('/rent-car', [\App\Http\Controllers\RentController::class, 'showRentForm'])->name('rent.car.submit');

Route::get('/rent-show', function () {
    return view('frontend.rent');
})->name('rent.index');


Route::get('admin/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.car.index');
Route::get('/admin/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders');
Auth::routes();
