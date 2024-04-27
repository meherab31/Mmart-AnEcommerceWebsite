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
    <title>About Us</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- Font Awesome CSS -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- Responsive styles -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <style>
        .hero-image {
            position: relative;
            text-align: center;
            color: white;
        }

        .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 3em;
        }

        .about-content {
            text-align: center;
        }

        .about-description {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('home.header')

    <!-- Hero Image with ABOUT US -->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-12 hero-image">
                <img src="images/arrival-bg.png" class="img-fluid" alt="About Us">
                <h1 class="hero-text">ABOUT US</h1>
            </div>
        </div>
    </div>

<!-- History Section -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">History</h2>
            <div class="history-block">
                <!-- Founding Story -->
                <h3>Founding Story</h3>
                <p>Our company was founded in the year 2005 by two passionate entrepreneurs, John Doe and Jane Smith. Both John and Jane shared a common vision of revolutionizing the tech industry by providing innovative solutions to everyday problems. With their combined expertise in software development and business management, they embarked on a journey to create a company that would redefine standards and set new benchmarks in the market.</p>

                <!-- Milestones -->
                <h3>Milestones</h3>
                <ul>
                    <li><strong>2005:</strong> Company XYZ founded by John Doe and Jane Smith.</li>
                    <li><strong>2008:</strong> Launched our flagship product, XYZ Pro, which gained widespread acclaim in the tech community.</li>
                    <li><strong>2012:</strong> Expanded operations globally, opening offices in Europe and Asia.</li>
                    <li><strong>2015:</strong> Achieved a major milestone of reaching one million active users worldwide.</li>
                    <li><strong>2020:</strong> Introduced groundbreaking AI technology, leading to a significant increase in product efficiency.</li>
                </ul>
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
