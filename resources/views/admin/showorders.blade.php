<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.css')
  <style>
    /* Custom CSS for responsiveness */
    .container-scroller {
      position: relative;
      overflow-x: hidden;
    }

    .main-panel {
      transition: width 0.25s ease, margin 0.25s ease;
      min-height: calc(100vh - 70px);
      padding-top: 20px;
      width: 0%;
    }

    .content-wrapper {
      background: #000000;
      width: 100%;
      overflow-x: auto;
    }

    .table-container {
      background-color: #ffffff;
      margin-bottom: 20px; /* Add margin to separate pagination from table */
    }

    .pagination {
      justify-content: center; /* Center align pagination links */
    }

    .pagination > li > a,
    .pagination > li > span {
      color: #ffffff; /* Set color for pagination links */
    }

    .pagination > li.active > a {
      background-color: #fcfcfc; /* Set background color for active page */
      border-color: #ffffff; /* Set border color for active page */
    }
    /* Styling for Sales Report button */
    .sales-report-btn {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin-top: 20px;
      margin-bottom: 20px;
      cursor: pointer;
      border-radius: 5px;
    }
    .mt-4 {
    margin-top: 50px !important;
}
  </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    <div class="main-panel">
      <!-- partial:partials/_navbar.html -->
      @include('admin.header')
      <!-- partial -->

      <!-- Main content wrapper -->

      <div class="content-wrapper">
        <!-- Include the orders page -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h1 class="text-center mt-4 mb-4">All Orders</h1>
                <!-- Single search input field -->
                <div class="mb-3">
                  <input type="text" id="searchInput" class="form-control text-white" placeholder="Search all orders">
                </div>
                <div class="table-container"> <!-- Wrap the table in a container with overflow-x: auto -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <!-- Table header -->
                      <thead>
                        <tr>
                          <!-- Header cells -->
                          <th>Order ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Product Title</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Image</th>
                          <th>Payment Status</th>
                          <th>Delivery Status</th>
                          <th>Track ID</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <!-- Table body -->
                      <tbody>
                        <!-- Table rows -->
                        @foreach($orders as $order)
                        <tr>
                          <td>{{ $order->id }}</td>
                          <td>{{ $order->name }}</td>
                          <td>{{ $order->email }}</td>
                          <td>{{ $order->phone }}</td>
                          <td>{{ $order->address }}</td>
                          <td>{{ $order->product_title }}</td>
                          <td>{{ $order->quantity }}</td>
                          <td>${{ $order->price }}</td>
                          <td>
                            <img src="/product/{{ $order->image }}" height="80px" width="80px">
                          </td>
                          <td>{{ $order->payment_status }}</td>
                          <td>{{ $order->delivery_status }}</td>
                          <td>{{ $order->track_id }}</td>
                          <td>
                            @if($order->delivery_status=='processing')
                              <a class="btn btn-success btn-sm" href="{{ url('delivery', $order->id ) }}" onclick="return confirm('Delivered Successfully?')">Delivered</a>
                            @else
                              <a class="btn btn-light btn-sm disabled" href="#">Delivered</a>
                            @endif
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- Pagination links -->
                <div class="row">
                    <div class="col">
                        <!-- Pagination links -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mt-4">
                                {!! $orders->links('pagination::bootstrap-4') !!}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <!-- Show results information -->
                        <p class="text-center">Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of {{ $orders->total() }} results</p>
                    </div>
                </div>
                <!-- Display total quantity and earnings -->
                <div class="row mt-4">
                    <div class="col">
                    <p>Total Ordered Quantity: {{ $totalQuantity }}</p>
                    <p>Total Earnings: ${{ $totalEarnings }}</p>
                    </div>
                </div>
                <button class="sales-report-btn" onclick="window.location.href='{{ route('sales_report') }}'">
                    <i class="mdi mdi-file-download"></i> Download Sales Report
                  </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- container-scroller -->
  @include('admin.js')
</body>
<script>
  // Get reference to the search input field
  const searchInput = document.getElementById('searchInput');

  // Add event listener to search input
  searchInput.addEventListener('input', searchOrders);

  function searchOrders() {
    const searchText = searchInput.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach(row => {
      // Get all cell data in lowercase for each row
      const rowData = Array.from(row.cells).map(cell => cell.innerText.toLowerCase());

      // Check if any cell data contains the search text
      const rowVisible = rowData.some(data => data.includes(searchText));

      // Show or hide row based on search result
      row.style.display = rowVisible ? '' : 'none';
    });
  }
</script>
</html>
