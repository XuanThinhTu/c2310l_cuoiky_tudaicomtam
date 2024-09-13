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
                                <th>Actions</th> <!-- New column for action buttons -->
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
                                    <td>
                                        <!-- Status Update Form -->
                                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                            @csrf
                                            <select name="status" class="form-control">
                                                <option value="in process"
                                                    {{ $order->status == 'in process' ? 'selected' : '' }}>In Process
                                                </option>
                                                <option value="approved"
                                                    {{ $order->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                <option value="rejected"
                                                    {{ $order->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-success mt-2">Update</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
