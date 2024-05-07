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
    <title>{{ $product->title }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- Font Awesome CSS -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- Responsive styles -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <!-- Header -->
    @include('home.header')

    <!-- Product Details -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-image">
                    <img src="product/{{ $product->image }}" class="img-fluid" alt="{{ $product->title }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-details">
                    <h2>{{ $product->title }}</h2>

                    <div class="price">
                        <strong>
                        @if ($product->discount_price != null)
                        <span style="color:red">${{ $product->discount_price }}</span>
                        <span style="text-decoration: line-through; color:rgba(4, 34, 0, 0.829)">{{ $product->price }}</span>
                        @else
                        <span style="color:rgb(4, 34, 0)">${{ $product->price }}</span>
                        @endif
                        </strong>
                    </div>

                    <p class="description">{{ $product->description }}</p>

                    <!-- Add to Cart and Buy Now buttons -->
                    <div class="btn-container mt-3">
                        <div>
                            <form action="{{ url('add_cart', $product->id) }}" method="POST">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-4" >

                                            <input type="number" name="quantity" value="1" min="1" style="width: 60%" >

                                        </div>

                                        <div class="col-md-4" style="width: 50%" >

                                            <input type="submit" value="Add to Cart" >

                                        </div>
                                    </div>
                            </form>
                        </div>
                        <button class="btn btn-success" >Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
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
