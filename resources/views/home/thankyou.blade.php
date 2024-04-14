<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Purchase!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            text-align: center;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h1 {
            color: #333;
            font-size: 36px;
            margin-bottom: 20px;
        }
        p {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
        }
        .tracking-id {
            font-size: 24px;
            font-weight: bold;
            color: #4CAF50;
            margin-bottom: 30px;
            animation: fadeInUp 1s ease-in-out;
        }
        .thank-you-img {
            margin-top: 30px;
            animation: bounceIn 1s ease-in-out;
        }
        .return-home-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .return-home-btn:hover {
            background-color: #45a049;
        }
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes bounceIn {
            0% { transform: scale(0.1); opacity: 0; }
            60% { transform: scale(1.2); }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container animate__animated animate__fadeIn">
        <h1>Thank You for Your Purchase!</h1>
        <p>Your order has been successfully placed.</p>
        <p>Your tracking ID is: <span class="tracking-id">{{ $track_id }}</span></p>
        <p>We are preparing your items for shipment. You will receive an email with tracking information once your order has shipped.</p>
        <a href="/" class="return-home-btn">Return to Home</a>
        <img src="/images/thank you.png" alt="Thank You Image" class="thank-you-img">
    </div>
</body>
</html>
