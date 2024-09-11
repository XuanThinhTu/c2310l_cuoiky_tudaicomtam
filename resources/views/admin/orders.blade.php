@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Orders</h1>

        <!-- Orders Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Order List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>User</th>
                                <th>Car</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->time }}</td>
                                    <td>{{ $order->date }}</td>
                                    <td>${{ number_format($order->price, 2) }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    <td>{{ $order->user ? $order->user->name : 'N/A' }}</td>
                                    <td>{{ $order->car ? $order->car->model : 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
