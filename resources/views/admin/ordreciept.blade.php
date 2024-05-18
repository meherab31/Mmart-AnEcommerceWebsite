<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 800px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            /* box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); */
        }

        .order-details {
            text-align: center;
            margin-bottom: 30px;
        }

        .order-info p {
            margin: 5px 0;
            text-align: center;
        }

        .order-items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .order-items th,
        .order-items td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .order-items th {
            background-color: #f2f2f2;
            font-weight: bold;
            /* color: #333; */
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="order-details">
            <h2>Order Details</h2>
            <div class="order-info">
                <p><strong>Name:</strong> {{ $order->name }}</p>
                <p><strong>Email:</strong> {{ $order->email }}</p>
                <p><strong>Phone:</strong> {{ $order->phone }}</p>
                <p><strong>Address:</strong> {{ $order->address }}</p>
                <p><strong>Order Date:</strong> {{ $order->created_at }}</p>
            </div>
        </div>
        <table class="order-items">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Tracking Id</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->product_title }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>৳{{ $order->price }}</td>
                    <td>{{ $order->track_id }}</td>
                </tr>

            </tbody>

        </table>
</body>
</html>
