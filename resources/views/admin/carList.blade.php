@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Cars</h1>

        <!-- Cars Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Car List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Seats</th>
                                <th>Available</th>
                                <th style="width: 200px;">Created At</th>
                                <th style="width: 200px;">Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                                <form action="{{ route('car.handleAction') }}" method="POST">
                                    @csrf <!-- Ensure you include CSRF protection -->
                                    <tr>
                                        <td>{{ $car->id }}</td>
                                        <input type="hidden" name="id" value="{{ $car->id }}">
                                        <td>
                                            <textarea name="cars[{{ $car->id }}][name]" rows="1" style="width: 100px;">{{ $car->name }}</textarea>
                                        </td>

                                        <td>
                                            <textarea name="cars[{{ $car->id }}][brand]" rows="1" style="width: 100px;">{{ $car->brand }}</textarea>
                                        </td>

                                        <td>
                                            <textarea name="cars[{{ $car->id }}][description]" rows="4" style="width: 200px;">{{ $car->description }}</textarea>
                                        </td>

                                        <td>
                                            <textarea name="cars[{{ $car->id }}][price]" rows="1" style="width: 70px;">{{ number_format($car->price) }}</textarea>
                                        </td>

                                        <td>
                                            <textarea name="cars[{{ $car->id }}][image]" rows="2" style="width: 200px;">{{ $car->image }}</textarea>
                                        </td>

                                        <td>
                                            <textarea name="cars[{{ $car->id }}][seats]" rows="1" style="width: 50px;">{{ $car->seats }}</textarea>
                                        </td>

                                        <td>
                                            <textarea name="cars[{{ $car->id }}][isAvailable]" rows="1" style="width: 70px;">{{ $car->isAvailable ? 'yes' : 'no' }}</textarea>
                                        </td>

                                        <td>
                                            <div class="ellipsis">{{ $car->created_at }}</div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">{{ $car->updated_at }}</div>
                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <input type="submit" name="Action" value="Update" />
                                                    <input type="submit" name="Action" value="Delete" />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Create New Car -->
                    <div class="form-group mt-4">
                        <h5>Add New Car</h5>
                        <form action="{{ route('car.handleAction') }}" method="POST">
                            @csrf <!-- Ensure you include CSRF protection -->
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" name="new_car[name]" placeholder="Name"
                                                class="form-control" />
                                        </td>
                                        <td>
                                            <input type="text" name="new_car[brand]" placeholder="Brand"
                                                class="form-control" />
                                        </td>
                                        <td>
                                            <input type="text" name="new_car[description]" placeholder="Description"
                                                class="form-control" />
                                        </td>
                                        <td>
                                            <input type="text" name="new_car[price]" placeholder="Price"
                                                class="form-control" />
                                        </td>
                                        <td>
                                            <input type="text" name="new_car[image]" placeholder="Image URL"
                                                class="form-control" />
                                        </td>
                                        <td>
                                            <input type="number" name="new_car[seats]" placeholder="Seats"
                                                class="form-control" />
                                        </td>
                                        <td>
                                            <select name="new_car[isAvailable]" class="form-control">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="submit" name="Action" value="Create" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- Check if there's a success message in session -->
    @if (session('success'))
        <script>
            // Display alert with success message
            alert("{{ session('success') }}");
        </script>
    @endif
@endsection
