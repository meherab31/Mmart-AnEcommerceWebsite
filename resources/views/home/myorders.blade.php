<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>My Orders</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- Font Awesome CSS -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- Responsive styles -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<style>
    /* Custom styles */
    .order-container {
        max-width: 800px;
        /* Adjust maximum width as needed */
        margin: 0 auto;
        /* Center the container */
    }

    .order-item {
        margin-bottom: 20px;
        /* Add some spacing between order items */
    }

    .order-item .row {
        align-items: center;
        /* Align items vertically in the row */
    }

    .order-item .col-md-8 {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .order-item .col-md-8 .card-body {
        padding: 15px;
    }

    .order-item .col-md-4 {
        display: flex;
        justify-content: center;
    }

    .order-item .card-img {
        max-height: 200px;
        max-width: 200px;
    }
</style>

<body>
    <!-- Header -->
    @include('home.header')
    @if (Session::has('cancel'))
        <div id="flash-message" class="alert alert-danger" role="alert">
            {{ Session::get('cancel') }}
            <button type="button" class="close" onclick="hideFlashMessage()">
                <span>&times;</span>
            </button>
        </div>
    @endif
    <!-- Order Details -->
    <div class="container order-container">
        @foreach ($orders as $order)
            <div class="order-item">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Tracking ID: {{ $order->track_id }}</h5>
                                <p class="card-text">Date: {{ $order->created_at->format('Y-m-d') }}</p>
                                <p class="card-text">Total Amount: ${{ $order->price }}</p>
                                <p class="card-text">Delivery Status: {{ $order->delivery_status }}</p>
                                <a href="/product_details/{{ $order->product_id }}" class="btn btn-primary">View
                                    Product</a>
                                @if($order->delivery_status == 'processing')
                                    <a href="{{ url('cancel_order', $order->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure to remove this product?')">Cancel Order</a>

                                @else

                                <a href="{{ url('cancel_order', $order->id) }}" class="btn btn-secondary"
                                    style="pointer-events: none">Cancel Order</a>

                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Product Image -->
                            <img src="/product/{{ $order->image }}" class="card-img" alt="Product Image" height="300px"
                                width="300px">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Footer -->
    @include('home.footer')

    <!-- Scripts -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <script src="home/js/popper.min.js"></script>
    <script src="home/js/bootstrap.js"></script>
    <script src="home/js/custom.js"></script>
</body>

</html>
