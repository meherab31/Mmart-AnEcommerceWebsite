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

      <style type="text/css">
        .cart{
            margin: auto;
            max-width: 800px;
            text-align: center;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .th_des{
            font-size: 20px;
            padding: 10px;
            background-color: #F6464F;
            color: white;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .product-row td {
            vertical-align: middle;
        }

        .product-name {
            font-weight: bold;
        }

        .product-image img {
            max-width: 80px;
            height: auto;
        }

        .total-price {
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }

        .total-price h3 {
            font-size: 24px;
            margin: 0;
        }

        .action-btn {
            background-color: #F6464F;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-bottom: 10px;
            cursor: pointer;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        .action-btn:hover {
            background-color: #c50f18;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
            <!-- header section strats -->
            @include('home.header')
            <!-- end header section -->

            <!--Cart Body Starts -->
            <div class="cart">
                <table>
                    <tr>
                        <th class="th_des">Product Name</th>
                        <th class="th_des">Quantity</th>
                        <th class="th_des">Price</th>
                        <th class="th_des">Image</th>
                        <th class="th_des">Action</th>
                    </tr>
                    <?php $totalprice = 0 ?>

                    @foreach ($cart as $cartitem)
                        <tr class="product-row">
                            <td class="product-name">{{ $cartitem->product_title }}</td>
                            <td>{{ $cartitem->quantity }}</td>
                            <td>${{ $cartitem->price }}</td>
                            <td class="product-image"><img src="/product/{{ $cartitem->image }}" alt="{{ $cartitem->product_title }}"></td>
                            <td><a onclick="return confirm('Are you sure to remove this product?')" class="action-btn" href="{{ url('remove_cartitem', $cartitem->id) }}">Remove</a></td>
                        </tr>
                        <?php $totalprice += $cartitem->price; ?>
                    @endforeach
                </table>

                <div class="total-price">
                    <h3>
                        Total Price : ${{ $totalprice }}
                    </h3>
                    <button class="action-btn">Proceed to Checkout</button>
                </div>
            </div>
            <!--Cart Body Ends-->

            <!-- footer start -->
            @include('home.footer')
            <!-- footer end -->
        </div>
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
