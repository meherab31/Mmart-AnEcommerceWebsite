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
            background-size: cover;
            background-position: center;
            color: white;
            padding: 250px 0;
            text-align: center;

        }

        h2{
            font-family: inherit;
        }
        .contact-info {
            background-color: #f8f9fa;
            padding: 50px 0;
        }

        .contact-form {
            padding: 50px 0;
        }

        .map {
            height: 400px;
            margin-top: 50px;
        }

        .map-info {
            text-align: center;
            margin-top: 30px;
            font-weight: bold;
        }

        .map-info h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .map-info p {
            font-size: 16px;
        }
        /* Style for Contact Section */
        .ftco-section {
            padding: 0em 0;
        }

        .a {
            color: #ffffff;
            font-weight: bold;
            font-style: italic;
        }

        .bg-primary {
            background-color: #dc3545 !important;
        }

        .contact-wrap {
            background: #fff;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .contact-wrap h3 {
            font-size: 20px;
            color: #333;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .contact-wrap .form-group {
            position: relative;
            margin-bottom: 30px;
        }

        .contact-wrap .form-group label {
            font-size: 16px;
            color: #333;
            font-weight: 500;
        }

        .contact-wrap .form-control {
            width: 100%;
            height: 50px;
            padding: 10px 20px;
            border-radius: 25px;
            border: 1px solid #e6e6e6;
            background-color: #f9f9f9;
            color: #333;
            font-size: 16px;
            font-weight: 400;
            transition: all 0.3s;
        }

        .contact-wrap .form-control:focus {
            outline: none;
            border-color: #E64A56;
        }

        .contact-wrap textarea.form-control {
            height: auto;
        }

        .contact-wrap .btn-primary {
            width: 100%;
            height: 50px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            background: #E64A56;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s;
        }

        .contact-wrap .btn-primary:hover {
            background: #912d0f;
        }

        .info-wrap {
            background: #E64A56;
            border-radius: 10px;
        }

        .info-wrap h3 {
            font-size: 20px;
            color: #fff;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .info-wrap p {
            font-size: 16px;
            color: #fff;
            font-weight: 400;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .info-wrap .dbox {
            position: relative;
            margin-bottom: 30px;

        }

        .info-wrap .dbox .icon {
            position: absolute;
            left: 0;
            top: 0;
            width: 50px;
            height: 50px;
            background: #000000;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .info-wrap .dbox .icon .fa {
            font-size: 24px;
            color: #fff;
        }

        .info-wrap .dbox .text {
            font-size: 16px;
            color: #fff;
            font-weight: 400;
            line-height: 1.8;
            margin-left: 60px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('home.header')

    <!-- Hero Area -->
    <section class="hero-area">
        <div class="container">
            <h2>We'd love to hear from you. Reach out to us using the information below or fill out the form and we'll
                get back to you as soon as possible.</h2>
        </div>
    </section>


    {{-- Contact Form --}}
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3 class="mb-4">Get in touch</h3>
                                    <div id="form-message-warning" class="mb-4"></div>
                                    <div id="form-message-success" class="mb-4">
                                        Please drop a message, we will reach you shortly
                                    </div>
                                    <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="name">Full Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        id="name" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="email">Email Address</label>
                                                    <input type="email" class="form-control" name="email"
                                                        id="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="subject">Subject</label>
                                                    <input type="text" class="form-control" name="subject"
                                                        id="subject" placeholder="Subject">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="#">Message</label>
                                                    <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Send Message" class="btn btn-primary">
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
                                <div class="info-wrap bg-primary w-100 p-md-5 p-4">
                                    <h3>Let's get in touch</h3>
                                    <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-map-marker"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Address:</span> Uttara, Dhaka - 1230
                                            </p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Phone:</span> <a class="a" href="tel://+8801400705569">+8801400705569</a></p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-paper-plane"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Email:</span> <a class="a"
                                                    href="mailto:meherabhassan42@gmail.com">meherabhassan42@gmail.com</a></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map -->
    <section class="map">
        <div class="container">
            <h3 class="text-center mb-4">Our Location</h3>
            <div class="map-info">
                <p>We are located at the heart of the city. Feel free to drop by anytime during our working hours.</p>
            </div>
            <!-- Replace the src attribute with your own Google Maps embed code -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d82553.80858814444!2d90.40142842919498!3d23.87552410547819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c5d0466c6fef%3A0x2d131b534751974b!2s1230!5e0!3m2!1sen!2sbd!4v1714632817269!5m2!1sen!2sbd" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
