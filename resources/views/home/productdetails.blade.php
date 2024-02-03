<!DOCTYPE html>
<html>
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
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50px; padding:30px">
            <div class="box">
               <div class="img-box">
                  <img src="product/{{ $product->image }} " height="250px" width="250px" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                   {{ $product->title }}
                  </h5>
                  <br>
                  @if ($product->discount_price!=null)
                  <h6 style="color:red">
                   ${{ $product->discount_price }}
                  </h6>

                  <h6 style="text-decoration: line-through; color:rgba(4, 34, 0, 0.829)">
                   ${{ $product->price }}
                  </h6>

                  @else
                  <h6 style="color:rgb(4, 34, 0)">
                   ${{ $product->price }}
                  </h6>
                  @endif

                  <p>
                    {{ $product->description }}
                  </p>
               </div>
            </div>
         </div>
      </div>
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->

      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
