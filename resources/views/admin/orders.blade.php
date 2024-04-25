<!-- orders.blade.php -->

<div class="content-wrapper">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
          </div>
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
                      <th>Product ID</th>
                      <th>Payment Status</th>
                      <th>Delivery Status</th>
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
                      <td>{{ $order->product_id }}</td>
                      <td>{{ $order->payment_status }}</td>
                      <td>{{ $order->delivery_status }}</td>
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
          </div>
        </div>
      </div>
    </div>
  </div>

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
