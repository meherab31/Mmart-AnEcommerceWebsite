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
    <title>Contact Us</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- Font Awesome CSS -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- Responsive styles -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <style>
        /* Custom CSS for Contact Us page */
        .hero-area {
            background-image: url('images/contact-bg.png');
            background-size:cover;
            background-position: center;
            color: white;
            padding: 250px 0;
            text-align: center;
        }

        .contact-info {
            background-color: #f8f9fa;
            padding: 50px 0;
        }

        .contact-form {
            padding: 50px 0;
        }

        .map {
            height: 200px;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('home.header')

    <!-- Hero Area -->
    <section class="hero-area">
        <div class="container">
            <h2>We'd love to hear from you. Reach out to us using the information below or fill out the form and we'll get back to you as soon as possible.</h2>
        </div>
    </section>


    </section>

    <!-- Map -->
    <section class="map">
        <div class="container">
            <!-- Replace the src attribute with your own Google Maps embed code -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3105.302862317059!2d-122.41908378467638!3d37.774929579755986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085806c6b320519%3A0xbdf884c61836a934!2sSan%20Francisco%2C%20CA!5e0!3m2!1sen!2sus!4v1634726006417!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" scrolling="yes"></iframe>

        </div>
    </section>

    <!-- Footer -->
    @include('home.footer')

    <!-- Scripts -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <script src="home/js/popper.min.js"></script>
    <script src="home/js/bootstrap.js"></script>
    <script src="home/js/custom.js"></script>

</body>

</html>
