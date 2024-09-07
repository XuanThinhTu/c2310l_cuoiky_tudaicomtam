@extends('layouts.frontend')

@section('content')
<header class="py-5" style="background-image: url('{{ asset('fontend/assets/cach-lua-cho-don-vi-cho-thue-xe-o-to-uy-tin.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 600px;">
    <div class="container px-4 px-lg-5 my-5 h-100">
      <div class="text-center text-white h-100 d-flex flex-column justify-content-center">
        {{-- <h1 class="display-4 fw-bold">Car Rental</h1>
        <p class="lead fw-normal text-light mb-0">
          With just one touch
        </p> --}}
      </div>
    </div>
  </header>
  <!-- Section-->
  <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
      <h3 class="text-center mb-5">List of vehicles</h3>
      <div
        class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"
      >
        <div class="col mb-5">
          <div class="card h-100">
            <!-- Sale badge-->
            <div
              class="badge badge-custom bg-warning text-white position-absolute"
              style="top: 0; right: 0"
            >
            Not available
            </div>
            <!-- Product image-->
            <img
              class="card-img-top"
              src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
              alt="..."
            />
            <!-- Product details-->
            <div class="card-body card-body-custom pt-4">
              <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">Special Item</h5>
                <!-- Product price-->
                <div class="rent-price mb-3">
                  <span class="text-primary">300.000đ/</span>day
                </div>
                <ul class="list-unstyled list-style-group">
                  <li
                    class="border-bottom p-2 d-flex justify-content-between"
                  >
                    <span>Fuel</span>
                    <span style="font-weight: 600">Gasoline</span>
                  </li>
                  <li
                    class="border-bottom p-2 d-flex justify-content-between"
                  >
                    <span>Number of seats</span>
                    <span style="font-weight: 600">5</span>
                  </li>
                  {{-- <li
                    class="border-bottom p-2 d-flex justify-content-between"
                  >
                    <span>Transmisi</span>
                    <span style="font-weight: 600">Manual</span>
                  </li> --}}
                </ul>
              </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer border-top-0 bg-transparent">
              <div class="text-center">
                <a class="btn btn-primary mt-auto" href="#">Rent</a>
                <a
                  class="btn btn-info mt-auto text-white"
                  href="{{route('detail')}}"
                  >Detail</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="col mb-5">
          <div class="card h-100">
            <!-- Sale badge-->
            <div
              class="badge badge-custom bg-success text-white position-absolute"
              style="top: 0; right: 0"
            >
            Available
            </div>
            <!-- Product image-->
            <img
              class="card-img-top"
              src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
              alt="..."
            />
            <!-- Product details-->
            <div class="card-body card-body-custom pt-4">
              <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">Special Item</h5>
                <!-- Product price-->
                <div class="rent-price mb-3">
                  <span class="text-primary">300.000đ/</span>day
                </div>
                <ul class="list-unstyled list-style-group">
                  <li
                    class="border-bottom p-2 d-flex justify-content-between"
                  >
                    <span>Fuel</span>
                    <span style="font-weight: 600">Gasoline</span>
                  </li>
                  <li
                    class="border-bottom p-2 d-flex justify-content-between"
                  >
                    <span>Number of seats</span>
                    <span style="font-weight: 600">5</span>
                  </li>
                  {{-- <li
                    class="border-bottom p-2 d-flex justify-content-between"
                  >
                    <span>Transmisi</span>
                    <span style="font-weight: 600">Manual</span>
                  </li> --}}
                </ul>
              </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer border-top-0 bg-transparent">
              <div class="text-center">
                <a class="btn btn-primary mt-auto" href="#">Rent</a>
                <a
                  class="btn btn-info mt-auto text-white"
                  href="{{route('detail')}}"
                  >Detail</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="col mb-5">
          <div class="card h-100">
            <!-- Sale badge-->
            <div
              class="badge badge-custom bg-success text-white position-absolute"
              style="top: 0; right: 0"
            >
            Available
            </div>
            <!-- Product image-->
            <img
              class="card-img-top"
              src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
              alt="..."
            />
            <!-- Product details-->
            <div class="card-body card-body-custom pt-4">
              <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">Special Item</h5>
                <!-- Product price-->
                <div class="rent-price mb-3">
                  <span class="text-primary">300.000đ/</span>day
                </div>
                <ul class="list-unstyled list-style-group">
                  <li
                    class="border-bottom p-2 d-flex justify-content-between"
                  >
                    <span>Fuel</span>
                    <span style="font-weight: 600">Gasoline</span>
                  </li>
                  <li
                    class="border-bottom p-2 d-flex justify-content-between"
                  >
                    <span>Number of seats</span>
                    <span style="font-weight: 600">5</span>
                  </li>
                  {{-- <li
                    class="border-bottom p-2 d-flex justify-content-between"
                  >
                    <span>Transmisi</span>
                    <span style="font-weight: 600">Manual</span>
                  </li> --}}
                </ul>
              </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer border-top-0 bg-transparent">
              <div class="text-center">
                <a class="btn btn-primary mt-auto" href="#">Rent</a>
                <a
                  class="btn btn-info mt-auto text-white"
                  href="{{route('detail')}}"
                  >Detail</a
                >
              </div>
            </div>
          </div>

        </div>
        <div class="col mb-5">
            <div class="card h-100">
              <!-- Sale badge-->
              <div
                class="badge badge-custom bg-success text-white position-absolute"
                style="top: 0; right: 0"
              >
              Available
              </div>
              <!-- Product image-->
              <img
                class="card-img-top"
                src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                alt="..."
              />
              <!-- Product details-->
              <div class="card-body card-body-custom pt-4">
                <div class="text-center">
                  <!-- Product name-->
                  <h5 class="fw-bolder">Special Item</h5>
                  <!-- Product price-->
                  <div class="rent-price mb-3">
                    <span class="text-primary">300.000đ/</span>day
                  </div>
                  <ul class="list-unstyled list-style-group">
                    <li
                      class="border-bottom p-2 d-flex justify-content-between"
                    >
                      <span>Fuel</span>
                      <span style="font-weight: 600">Gasoline</span>
                    </li>
                    <li
                      class="border-bottom p-2 d-flex justify-content-between"
                    >
                      <span>Number of seats</span>
                      <span style="font-weight: 600">5</span>
                    </li>
                    {{-- <li
                      class="border-bottom p-2 d-flex justify-content-between"
                    >
                      <span>Transmisi</span>
                      <span style="font-weight: 600">Manual</span>
                    </li> --}}
                  </ul>
                </div>
              </div>
              <!-- Product actions-->
              <div class="card-footer border-top-0 bg-transparent">
                <div class="text-center">
                  <a class="btn btn-primary mt-auto" href="#">Rent</a>
                  <a
                    class="btn btn-info mt-auto text-white"
                    href="{{route('detail')}}"
                    >Detail</a
                  >
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
@endsection
