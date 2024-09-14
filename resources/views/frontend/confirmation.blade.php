@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Order Confirmation</h1>
        <p>Your order is currently being processed. Please wait for admin confirmation.</p>
        <p id="status-message"></p>
    </div>

    <script>
        setInterval(function() {
            fetch('{{ route('checkOrderStatus', ['order_id' => $order->id]) }}')
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'approved') {
                        window.location.href = '{{ route('frontend.approved') }}';
                    } else if (data.status === 'rejected') {
                        window.location.href = '{{ route('frontend.rejected') }}';
                    }
                })
                .catch(error => console.log(error));
        }, 5000); // Check every 5 seconds
    </script>
@endsection
