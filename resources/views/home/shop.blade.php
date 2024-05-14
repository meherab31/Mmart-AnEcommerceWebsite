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
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .panel {
            border: none;
            box-shadow: none;
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
    </style>
</head>



<body>
    <!-- Header -->
    @include('home.header')
    @if(Session::has('cart'))
    <div id="flash-message" class="alert alert-success" role="alert">
        {{ Session::get('cart') }}
        <button type="button" class="close" onclick="hideFlashMessage()">
            <span>&times;</span>
        </button>
    </div>
    @endif
    <div class="container bootdey">
        <div class="row">
            <div class="col-md-3">
                {{-- <section class="panel">
                <div class="panel-body">
                    <input type="text" placeholder="Keyword Search" class="form-control" />
                </div>
            </section> --}}
                <section class="panel">
                    <header class="panel-heading">
                        Category
                    </header>
                    <div class="panel-body">
                        @foreach ($categories as $category)
                            <ul class="nav prod-cat">
                                <li>
                                    <a href="/shop/{{ $category->category_name }}">
                                        <i class="fa fa-angle-right"></i> {{ $category->category_name }}
                                    </a>
                                </li>
                            </ul>
                        @endforeach

                    </div>
                </section>

                <section class="panel">
                    <header class="panel-heading">
                        Price Range
                    </header>
                    <div class="panel-body sliders">
                        <div id="slider-range" class="slider"></div>
                        <div class="slider-info">
                            <span id="slider-range-amount"></span>
                        </div>
                    </div>
                </section>
                <section class="panel">
                    <header class="panel-heading">
                        Filter
                    </header>
                    <div class="panel-body">
                        <form role="form product-form">
                            <div class="form-group">
                                <label>Brand</label>
                                <select class="form-control hasCustomSelect"
                                    style="-webkit-appearance: menulist-button; width: 231px; position: absolute; opacity: 0; height: 34px; font-size: 12px;">
                                    <option>Wallmart</option>
                                    <option>Catseye</option>
                                    <option>Moonsoon</option>
                                    <option>Textmart</option>
                                </select>
                                <span class="customSelect form-control" style="display: inline-block;"><span
                                        class="customSelectInner"
                                        style="width: 209px; display: inline-block;">Wallmart</span></span>
                            </div>
                            <div class="form-group">
                                <label>Color</label>
                                <select class="form-control hasCustomSelect"
                                    style="-webkit-appearance: menulist-button; width: 231px; position: absolute; opacity: 0; height: 34px; font-size: 12px;">
                                    <option>White</option>
                                    <option>Black</option>
                                    <option>Red</option>
                                    <option>Green</option>
                                </select>
                                <span class="customSelect form-control" style="display: inline-block;"><span
                                        class="customSelectInner"
                                        style="width: 209px; display: inline-block;">White</span></span>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control hasCustomSelect"
                                    style="-webkit-appearance: menulist-button; width: 231px; position: absolute; opacity: 0; height: 34px; font-size: 12px;">
                                    <option>Small</option>
                                    <option>Medium</option>
                                    <option>Large</option>
                                    <option>Extra Large</option>
                                </select>
                                <span class="customSelect form-control" style="display: inline-block;"><span
                                        class="customSelectInner"
                                        style="width: 209px; display: inline-block;">Small</span></span>
                            </div>
                            <button class="btn btn-primary" type="submit">Filter</button>
                        </form>
                    </div>
                </section>
            </div>
            <div class="col-md-9">
                {{-- <div>
                    <section class="panel">
                        <div class="panel-body">
                            <div class="pull-right">
                                <ul class="pagination pagination-sm pro-page-list">
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div> --}}

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
                                            ${{ $product->discount_price }}
                                        </p>

                                        <p style="text-decoration: line-through; color:rgba(4, 34, 0, 0.829)">
                                            ${{ $product->price }}
                                        </p>
                                    @else
                                        <p style="color:rgb(4, 34, 0)">
                                            ${{ $product->price }}
                                        </p>
                                    @endif
                                </div>
                            </section>
                        </div>
                    @endforeach
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
</html>