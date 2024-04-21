<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-oYZ5VZ8qr7rN3q2zE15naNcTwMwiU2jZX3C5B/HBPKGeF7UjrZ+txWnxO/q65wHi" crossorigin="anonymous">

    <title>Stripe Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        /* Custom CSS for the payment page */
        body {
            background-color: #f8f9fa;
        }

        .center-align {
            text-align: center;
        }

        .payment-container {
            margin-top: 50px;
        }

        .payment-heading {
            margin-bottom: 30px;
            color: #f44245;
        }

        .credit-card-box {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .credit-card-box .panel-heading {
            background-color: #f44245;
            color: #fff;
            border-radius: 5px 5px 0 0;
            position: relative; /* Added */
        }

        .credit-card-box .panel-heading h3 {
            margin: 0;
            padding: 10px 0;
        }

        .panel-heading .logo-img {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            max-height: 50px; /* Adjust as needed */
            background-color: #ffffff;
        }

        .panel-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
            box-shadow: none;
        }

        .btn-pay-now {
            padding: 15px;
            font-size: 18px;
            border-radius: 5px;
            background-color: #f44245;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 20px;
        }

        .btn-pay-now:hover {
            background-color: #d33134;
        }

        .credit-card-icons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .credit-card-icons img {
            max-width: 100px;
            height: auto;
            display: none;
        }

        .card-icon {
            background-repeat: no-repeat;
            background-position: right center;
            padding-right: 35px;
        }

        .visa {
            /* background-image: url('/images/visa.png'); Adjusted URL */
            background-size: 100%;
        }

        .mastercard {
            /* background-image: url('/images/mastercard.png'); Adjusted URL */
            background-size: 100%;
        }

        .amex {
            /* background-image: url('/images/amex.png'); Adjusted URL */
            background-size: 100%;
        }

        .default-card {
            /* background-image: url('/images/default.png'); Adjusted URL */
            background-size: 100%;
        }

    </style>
</head>
<body>

<div class="container payment-container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading">
                    <h3 class="panel-title">Payment Details</h3>
                    <img src="/images/logo.png" alt="Mmart" class="logo-img"> <!-- Adjusted class -->
                </div>
                <div class="panel-body">
                    <h1 class="payment-heading">Stripe Payment</h1>
                    <div class="credit-card-icons">
                        <img src="/images/visa.png" alt="Visa" class="visa card-icon">
                        <img src="/images/mastercard.png" alt="Mastercard" class="mastercard card-icon">
                        <img src="/images/amex.png" alt="American Express" class="amex card-icon">
                        <img src="/images/default.png" alt="Card" class="default-card card-icon"> <!-- Adjusted to include default card icon -->
                    </div>
                    <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="control-label">Name on Card</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="card_number" class="control-label">Card Number</label>
                            <input type="text" id="card_number" name="card_number" class="form-control card-number" required>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="cvc" class="control-label">CVC</label>
                                <input type="text" id="cvc" name="cvc" class="form-control card-cvc" placeholder="ex. 311" required>
                            </div>
                            <div class="col-xs-6">
                                <label for="expiry_month" class="control-label">Expiration Month</label>
                                <input type="text" id="expiry_month" name="expiry_month" class="form-control card-expiry-month" placeholder="MM" required>
                            </div>
                            <div class="col-xs-6">
                                <label for="expiry_year" class="control-label">Expiration Year</label>
                                <input type="text" id="expiry_year" name="expiry_year" class="form-control card-expiry-year" placeholder="YYYY" required>
                            </div>
                        </div>
                        <!-- Hidden input field for totalPrice -->
                        <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg btn-pay-now" type="submit">Pay Now (${{ $totalPrice }})</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap and jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://js.stripe.com/v2/"></script>

<script>
    $(function() {
        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/
        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });

        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#card_number').on('input', function() {
            var cardNumber = $(this).val();
            if (/^4/.test(cardNumber)) {
                $('.visa').show();
                $('.mastercard').hide();
                $('.amex').hide();
                $('.default-card').hide(); // Hide default card icon when Visa card is detected
            } else if (/^5[1-5]/.test(cardNumber)) {
                $('.visa').hide();
                $('.mastercard').show();
                $('.amex').hide();
                $('.default-card').hide(); // Hide default card icon when Mastercard is detected
            } else if (/^3[47]/.test(cardNumber)) {
                $('.visa').hide();
                $('.mastercard').hide();
                $('.amex').show();
                $('.default-card').hide(); // Hide default card icon when American Express card is detected
            } else {
                $('.visa').hide();
                $('.mastercard').hide();
                $('.amex').hide();
                $('.default-card').show(); // Show default card icon when none of the specific card types are detected
            }
        });
    });
</script>
</body>
</html>
