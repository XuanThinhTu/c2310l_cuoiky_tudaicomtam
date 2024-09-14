@extends('layouts.frontend')

@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif

@section('content')
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">{{ $car->name }}</h1>
                <p class="lead fw-normal text-white-50">{{ $car->brand }}</p>
            </div>
        </div>
    </header>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">

            <!-- Flash Message Section -->
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <!-- End Flash Message Section -->

            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ $car->image }}" alt="{{ $car->name }}" />
                        <!-- Product details-->
                        <div class="card-body card-body-custom pt-4">
                            <h3 class="fw-bolder text-primary">Description</h3>
                            <p>{{ $car->description }}</p>
                            <div class="mobil-info-list border-top pt-4">
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="ri-checkbox-circle-line"></i>
                                        <span style="color: {{ $car->isAvailable == 1 ? 'green' : 'red' }}">
                                            {{ $car->isAvailable == 1 ? 'Available' : 'Unavailable' }}
                                        </span>
                                    </li>

                                    <li><i class="ri-checkbox-circle-line"></i><span>Seats: {{ $car->seats }}</span></li>
                                    <li><i class="ri-checkbox-circle-line"></i><span>Price: {{ $car->price }}
                                            VND/day</span></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Book Now Button -->
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="car_id" value="{{ $car->id }}">
                            <input type="hidden" name="price" value="{{ $car->price }}">

                            <!-- Time and Date Fields -->
                            <div class="form-group">
                                <label for="time">Select Time:</label>
                                <input type="time" name="time" id="time" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="date">Select Date:</label>
                                <input type="date" name="date" id="date" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </form>
                        <!-- End Book Now Button -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
