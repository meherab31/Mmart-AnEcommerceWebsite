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
    <title>Shop</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- Font Awesome CSS -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- Responsive styles -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .form-control.hasCustomSelect {
            -webkit-appearance: menulist-button;
            height: 34px;
            font-size: 15px;
        }

        .btn-primary {
            color: #fff;
            --bs-btn-bg: #F34954;
            --bs-btn-border-color: #F34954;
        }

        .btn-success {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
        }

        .panel {
            border: none;
            box-shadow: none;
            margin-bottom:
        }

        .panel-heading {
            border-color: #eff2f7;
            font-size: 16px;
            font-weight: 600;
        }

        .panel-title {
            color: #2A3542;
            font-size: 14px;
            font-weight: 400;
            margin-bottom: 0;
            margin-top: 0;
            font-family: 'Open Sans', sans-serif;
        }

        .cat {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .cat li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            /* Optional: Add some space between items */
        }

        .cat input[type="radio"] {
            display: none;
            /* Hide the original radio button */
        }

        .cat label {
            display: flex;
            align-items: center;
            cursor: pointer;
            font-size: 16px;
            /* Adjust font size as needed */
            position: relative;
        }

        .cat label::before {
            content: '';
            display: inline-block;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 2px solid #F34954;
            /* Customize the border color */
            margin-right: 10px;
            box-sizing: border-box;
            transition: background 0.3s, border-color 0.3s;
        }

        .cat input[type="radio"]:checked+label::before {
            background: #F34954;
            /* Customize the fill color when selected */
            border-color: #F34954;
            /* Customize the border color when selected */
        }

        .cat input[type="radio"]:checked+label::after {
            content: '';
            display: block;
            width: 10px;
            height: 10px;
            background: white;
            /* Inner circle color */
            border-radius: 50%;
            position: absolute;
            left: 4px;
            top: 4px;
        }

        /*product list*/


        .prod-cat li a {
            border-bottom: 1px dashed #d9d9d9;
        }

        .prod-cat li a {
            color: #3b3b3b;
        }

        .prod-cat li ul {
            margin-left: 30px;
        }

        .prod-cat li ul li a {
            border-bottom: none;
        }

        .prod-cat li ul li a:hover,
        .prod-cat li ul li a:focus,
        .prod-cat li ul li.active a,
        .prod-cat li a:hover,
        .prod-cat li a:focus,
        .prod-cat li a.active {
            background: none;
            color: #ff7261;
        }

        .pro-lab {
            margin-right: 20px;
            font-weight: normal;
        }

        .pro-sort {
            padding-right: 20px;
            float: left;
        }

        .pro-page-list {
            margin: 5px 0 0 0;
        }

        .product-list img {
            width: 100%;
            border-radius: 4px 4px 0 0;
            -webkit-border-radius: 4px 4px 0 0;
        }

        .product-list .pro-img-box {
            position: relative;
        }

        .adtocart {
            background: #fc5959;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            color: #fff;
            display: inline-block;
            text-align: center;
            border: 3px solid #fff;
            left: 45%;
            bottom: -25px;
            position: absolute;
        }

        .adtocart i {
            color: #fff;
            font-size: 25px;
            line-height: 42px;
        }

        .pro-title {
            color: #5A5A5A;
            display: inline-block;
            margin-top: 30px;
            font-size: 16px;
        }

        .product-list .price {
            color: #fc5959;
            font-size: 15px;
            font-weight: bold;
        }

        .pro-img-details {
            margin-left: -15px;
        }

        .pro-img-details img {
            width: 100%;
        }

        .pro-d-title {
            font-size: 16px;
            margin-top: 0;
        }

        .product_meta {
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
            padding: 10px 0;
            margin: 15px 0;
        }

        .product_meta span {
            display: block;
            margin-bottom: 10px;
        }

        .product_meta a,
        .pro-price {
            color: #fc5959;
        }

        .pro-price,
        .amount-old {
            font-size: 18px;
            padding: 0 10px;
        }

        .amount-old {
            text-decoration: line-through;
        }

        .quantity {
            width: 120px;
        }

        .pro-img-list {
            margin: 10px 0 0 -15px;
            width: 100%;
            display: inline-block;
        }

        .pro-img-list a {
            float: left;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .pro-d-head {
            font-size: 18px;
            font-weight: 300;
        }

        .sidebar {
            background-color: #f190973a;
        }
    </style>
</head>



<body>
    <!-- Header -->
    @include('home.header')
    @if (Session::has('cart'))
        <div id="flash-message" class="alert alert-success" role="alert">
            {{ Session::get('cart') }}
            <button type="button" class="close" onclick="hideFlashMessage()">
                <span>&times;</span>
            </button>
        </div>
    @endif
    <div class="container bootdey">
        <div class="row">
            <div class="col-md-3 sidebar">
                {{-- <section class="panel">

                </section> --}}

                <section class="panel">
                    <form action="{{ route('shop.filter') }}" method="GET" role="form product-form">
                        <header class="panel-heading">
                            Category
                        </header>
                        <div class="panel-body">
                            @foreach ($categories as $category)
                                <ul class="nav cat">
                                    <li>
                                        <input type="radio" name="category" value="{{ $category->category_name }}"
                                            id="category{{ $category->id }}">
                                        <label for="category{{ $category->id }}">{{ $category->category_name }}</label>
                                    </li>
                                </ul>
                            @endforeach

                        </div>
                        <header class="panel-heading">
                            Product Filters
                        </header>
                        <div class="panel-body">

                            <!-- Sorting -->

                            <div class="form-group">
                                <select name="sort" class="form-control hasCustomSelect">
                                    <option value="" selected disabled>Sort By</option>
                                    <option value="title_asc">Title: A to Z</option>
                                    <option value="title_desc">Title: Z to A</option>
                                    <option value="price_asc">Price: Lowest to Highest</option>
                                    <option value="price_desc">Price: Highest to Lowest</option>
                                </select>
                            </div>

                            <!-- Price Range -->
                            <section class="panel">
                                <header class="panel-heading">
                                    Price Range
                                </header>
                                <div class="panel-body sliders">
                                    <div id="slider-range" class="slider"></div>
                                    <div class="slider-info">
                                        <span id="slider-range-amount"></span>
                                    </div>
                                    <input type="hidden" id="min_price" name="min_price">
                                    <input type="hidden" id="max_price" name="max_price">
                                </div>
                            </section>

                            <button class="btn btn-primary" type="submit">Filter</button>
                            <a href="{{ url('shop') }}" class="btn btn-secondary">Reset Filters</a>
                        </div>
                    </form>
                </section>
            </div>
            <div class="col-md-9">
                <div class="row product-list">
                    <!-- Product List -->
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <section class="panel">
                                <div class="pro-img-box">
                                    <img src="/product/{{ $product->image }}" height="250px" width="200px" />
                                    <form action="/add_cart/{{ $product->id }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="adtocart" data-product-id="{{ $product->id }}">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="panel-body text-center">
                                    <h4>
                                        <a href="/product_details/{{ $product->id }}" class="pro-title">
                                            {{ $product->title }}
                                        </a>
                                    </h4>
                                    @if ($product->discount_price != null)
                                        <p style="color:red">
                                            ৳ {{ $product->discount_price }}
                                        </p>

                                        <p style="text-decoration: line-through; color:rgba(4, 34, 0, 0.829)">
                                            ৳ {{ $product->price }}
                                        </p>
                                    @else
                                        <p style="color:rgb(4, 34, 0)">
                                            ৳ {{ $product->price }}
                                        </p>
                                    @endif
                                </div>
                            </section>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination links -->
                <div class="row">
                    <div class="col">
                        <!-- Pagination links -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mt-4">
                                {!! $products->links('pagination::bootstrap-4') !!}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <!-- Show results information -->
                        <p class="text-center">Showing {{ $products->firstItem() }} to
                            {{ $products->lastItem() }} of {{ $products->total() }} results</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('home.footer')

</body>

<!-- Scripts -->
<script src="home/js/jquery-3.4.1.min.js"></script>
<script src="home/js/popper.min.js"></script>
<script src="home/js/bootstrap.js"></script>
<script src="home/js/custom.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    // Function to hide the flash message after 3 seconds
    setTimeout(() => {
        hideFlashMessage();
    }, 1000);

    // Function to hide the flash message
    function hideFlashMessage() {
        const flashMessage = document.getElementById('flash-message');
        flashMessage.style.display = 'none';
    }
</script>

<script>
    $(function() {
        // Initialize the slider
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 100000,
            values: [0, 0],
            slide: function(event, ui) {
                $("#slider-range-amount").text("$" + ui.values[0] + " - $" + ui.values[1]);
                $("#min_price").val(ui.values[0]);
                $("#max_price").val(ui.values[1]);
            }
        });

        // Set initial values for display and hidden inputs
        $("#slider-range-amount").text("$" + $("#slider-range").slider("values", 0) + " - $" + $(
            "#slider-range").slider("values", 1));
        $("#min_price").val($("#slider-range").slider("values", 0));
        $("#max_price").val($("#slider-range").slider("values", 1));
    });
</script>

</html>
