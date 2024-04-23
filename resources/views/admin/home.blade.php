<!-- admin.home.blade.php -->

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
      overflow-x:auto;
    }
    .table-container{
        background-color: #ffffff;
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
        @include('admin.orders', ['orders' => $orders])
        @include('admin.body')
      </div>
    </div>
  </div>
  <!-- container-scroller -->
  @include('admin.js')
</body>
</html>
