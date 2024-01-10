<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .div_center{
            text-align: center;
            padding-top: 20px;
        }
        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
        }
    </style>
  </head>
  <body>
    <!-- partial:partials/_navbar.html -->
    @include('admin.header')
    <!-- partial -->
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper" >
        @if (session('message'))
            <div class="alert alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('message') }}

            </div>
        @endif

            <div class="div_center">
                <h2 class="h2_font">Add Category</h2>
                <form action="{{ url('/add_category') }}" method="POST">
                    @csrf
                    <input type="text" name="category" placeholder="Write Category Name">
                    <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                </form>
            </div>
        </div>
      </div>
    </div>
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>
