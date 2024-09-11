@extends('layouts.frontend')

@section('content')
    <header class="bg-dark py-5">
        <section class="bg-image">
            <div class="container px-4 px-lg-5 my-5 text-center text-white">
                <h1 class="display-4 fw-bolder">Car Rental</h1>
                <p class="lead fw-normal text-white-50 mb-0">
                    with just one touch
                </p>
            </div>
        </section>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h3 class="text-center mb-5">List of vehicles</h3>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($cars as $car)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Badge depending on availability -->
                            <div class="badge badge-custom {{ $car->isAvailable ? 'bg-success' : 'bg-warning' }} text-white position-absolute"
                                style="top: 0; right: 0">
                                {{ $car->isAvailable ? 'Available' : 'Not available' }}
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ $car->image }}" alt="{{ $car->name }}" />
                            <!-- Product details-->
                            <div class="card-body card-body-custom pt-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $car->name }}</h5>
                                    <!-- Product price-->
                                    <div class="rent-price mb-3">
                                        <span class="text-primary">{{ number_format($car->price, 0, ',', '.') }}
                                            VND/</span>day
                                    </div>
                                    <ul class="list-unstyled list-style-group">
                                        <li class="border-bottom p-2 d-flex justify-content-between">
                                            <span>Number of seats</span>
                                            <span style="font-weight: 600">{{ $car->seats }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-primary mt-auto" href="{{ route('rent.index', ['id' => $car->id]) }}">Rent</a>
                                    <a class="btn btn-info mt-auto text-white"
                                        href="{{ route('detail', ['id' => $car->id]) }}">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Pagination links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $cars->links() }}
            </div>
        </div>
    </section>
@endsection
