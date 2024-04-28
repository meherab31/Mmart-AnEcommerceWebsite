<!-- admin.home.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>

  @include('admin.css')

  <style>

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
        @include('admin.body')
      </div>
    </div>
  </div>
  <!-- container-scroller -->
  @include('admin.js')
</body>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
