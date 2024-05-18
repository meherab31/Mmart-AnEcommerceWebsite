<!-- salesreport.blade.php -->
<style>
    .tab_center {
        padding-top: 20px;
        margin: auto;
        border: 2px solid white;
        margin-top: 10px;
        margin-bottom: 10px;
        font-family: 'Times New Roman';
    }

    .tab_center th,
    .tab_center td {
        border: 1px solid #08dbbfd5;
        padding: 8px;
        text-align: center;
    }

    .tr_bg {
        background-color: #10a894;
    }

    .h1 {
        text-align: center;
    }

    .grid-container {
        display: grid;
        grid-template-columns: auto auto;
        padding: 10px;
    }

    .grid-item1 {
        padding: 20px;
        text-align: left;
    }

    .grid-item2 {

        padding: 20px;
        text-align: right;
    }
</style>

<div class="grid-container">
    <div class="row mt-4 grid-item1">
        <div class="col">
            <h3>Total Product Ordered: {{ $totalQuantity }}</p>
                <h3>Total Earnings: ৳{{ $totalEarnings }}</p>
        </div>
    </div>
    <div class="row mt-4 grid-item2">
        <p id="datetime"></p>
    </div>
</div>

<h1 class="h1">Sales Report</h1>
<div class="table-container"> <!-- Wrap the table in a container with overflow-x: auto -->
    <div class="table-responsive">
        <table class="tab_center">
            <!-- Table header -->
            <thead>
                <tr class="tr_bg">
                    <!-- Header cells -->
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Product ID</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                <!-- Table rows -->
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->product_title }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>${{ $order->price }}</td>
                        <td>{{ $order->product_id }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->delivery_status }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<script>

</script>
