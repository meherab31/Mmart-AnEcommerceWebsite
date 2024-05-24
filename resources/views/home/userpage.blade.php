<!DOCTYPE html>
<html>
   <head>
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
      <title>MH WEAR | Wear Everything</title>
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
         @if(Session::has('cart'))
         <div id="flash-message" class="alert alert-success" role="alert">
             {{ Session::get('cart') }}
             <button type="button" class="close" onclick="hideFlashMessage()">
                 <span>&times;</span>
             </button>
         </div>
         @elseif (Session::has('discount'))
         <div id="flash-message" class="alert alert-success" role="alert">
             {{ Session::get('discount') }}
             <button type="button" class="close" onclick="hideFlashMessage()">
                 <span>&times;</span>
             </button>
         </div>
         @endif
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
        <!-- why section -->
        @include('home.why')
        <!-- end why section -->

      <!-- arrival section -->
      @include('home.arrival')
      <!-- end arrival section -->

      <!-- product section -->
      @include('home.product')
      <!-- end product section -->

      <!-- subscribe section -->
      @include('home.subscriber')
      <!-- end subscribe section -->

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


    <!-- JavaScript to auto-hide the flash message after 2 seconds -->
    <script>
        // Function to hide the flash message
        function hideFlashMessage() {
            var flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                flashMessage.style.display = 'none';
            }
        }

        // Auto-hide the flash message after 2 seconds
        setTimeout(hideFlashMessage, 2000);
    </script>

</html>
