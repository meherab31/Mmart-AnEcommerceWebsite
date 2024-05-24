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

<style>
    .fa-star,  .fa-star-half-o, .fa-star-o{
        color: #F84352;
    }
    .review-form, .reviews{
        margin-bottom: 20px;
    }
</style>

<body>
    <!-- Header -->
    @include('home.header')

    <!-- Product Details -->
    <div class="container mt-5 color">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-image">
                    <img src="product/{{ $product->image }}" class="img-fluid" alt="{{ $product->title }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-details">
                    <p></p>
                    <h2>{{ $product->title }}</h2>

                    <div class="average-rating">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $averageRating)
                                <i class="fa fa-star"></i>
                            @elseif ($i - 0.5 <= $averageRating)
                                <i class="fa fa-star-half-o"></i>
                            @else
                                <i class="fa fa-star-o"></i>
                            @endif
                        @endfor
                        <span>{{ number_format($averageRating, 1) }}</span>
                    </div>

                    <div class="price">
                        <strong>
                            @if ($product->discount_price != null)
                                <span style="color:red">৳{{ $product->discount_price }}</span>
                                <span
                                    style="text-decoration: line-through; color:rgba(4, 34, 0, 0.829)">{{ $product->price }}</span>
                            @else
                                <span style="color:rgb(4, 34, 0)">${{ $product->price }}</span>
                            @endif
                        </strong>
                    </div>

                    <p class="description">{{ $product->description }}</p>

                    <!-- Add to Cart and Buy Now buttons -->
                    <div class="btn-container mt-3">
                        <div>
                            <form action="{{ url('add_cart', $product->id) }}" method="POST" id="buyNowForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">

                                        <input type="number" name="quantity" value="1" min="1"
                                            style="width: 60%">
                                        <input type="hidden" name="buyNow" value="true">
                                    </div>

                                    <div class="col-md-4" style="width: 50%">

                                        <input type="submit" value="Add to Cart">

                                    </div>

                                </div>
                                <button class="btn btn-success" onclick="submitForm()">Buy Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="mt-5">
            <!-- Review Form -->
            <div class="review-form">
                @auth
                    <div class="mt-4">
                        <h5>Give a Review and Rating</h5>
                        <form action="{{ route('review.store', ['productId' => $product->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="rating">Rating:</label>
                                <select name="rating" id="rating" class="form-control">
                                    <option value="1">1 Star</option>
                                    <option value="2">2 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="5">5 Stars</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="review">Review:</label>
                                <textarea name="review" id="review" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </form>
                    </div>
                @else
                    <p>Please <a href="{{ route('login') }}">login</a> to leave a review.</p>
                @endauth
            </div>

            <div class="reviews">
                <h4>Reviews</h4>
                @if (!empty($product->reviews))
                    @foreach ($product->reviews as $review)
                        <div class="review">
                            <div><strong>{{ $review->user->name }}</strong> - {{ $review->rating }} stars</div>
                            <div>{{ $review->review }}</div>
                            <!-- Reply and Delete Options -->
                            <div class="d-flex justify-content-between mt-2">
                                @auth
                                    @if (Auth::user()->id === $review->user_id)
                                        <form action="{{ route('review.destroy', $review->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    @else
                                        <a href="#" class="btn btn-sm btn-primary">Reply</a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No reviews available.</p>
                @endif
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
    <script>
        function submitForm() {
            document.getElementById('buyNowForm').submit();
        }
    </script>

</body>

</html>
