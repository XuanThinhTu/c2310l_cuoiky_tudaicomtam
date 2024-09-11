@extends('layouts.frontend')

@section('content')

<form action="{{ route('rent.car.submit') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="phonenumber" class="form-label">Phone Number</label>
        <input type="text" class="form-control" id="phonenumber" name="phonenumber" required>
    </div>
    <div class="mb-3">
        <label for="birth" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="birth" name="birth" required>
    </div>
    <div class="mb-3">
        <label for="CCCD" class="form-label">CCCD</label>
        <input type="text" class="form-control" id="CCCD" name="CCCD" required>
    </div>
    <div class="mb-3">
        <label for="license" class="form-label">Driver's License</label>
        <input type="text" class="form-control" id="license" name="license" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection