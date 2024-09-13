<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('/contact', [\App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/detail/{id}', [\App\Http\Controllers\HomeController::class, 'detail'])->name('detail');

// Book Now route
Route::post('/order', [\App\Http\Controllers\Admin\OrderController::class, 'store'])->name('order.store');
Route::get('/orders/confirmation', [\App\Http\Controllers\Admin\OrderController::class, 'confirmation'])->name('orders.confirmation');

//Admin Route
Route::get('admin/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.car.index');
Route::get('/admin/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders');
Auth::routes();
