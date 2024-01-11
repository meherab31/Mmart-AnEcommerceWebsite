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
        .center {
            margin: auto;
            width: 50%;
            margin-top: 30px;
        }

        .center table {
            border-collapse: collapse;
            width: 100%;
        }

        .center table, .center th, .center td {
            border: 1px solid rgb(44, 168, 240);
        }

        .center th, .center td {
            padding: 10px;
            text-align: left;
        }

        .center th {
            background-color: rgb(0, 11, 109);
            color: white;
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
        @if (session('added'))
            <div class="alert alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('added') }}
            </div>
        @elseif (session('delete'))
            <div class="alert alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('delete') }}
        </div>
        @endif



            <div class="div_center">
                <h2 class="h2_font">Add Category</h2>
                <form action="{{ url('/add_category') }}" method="POST">
                    @csrf
                    <input type="text" name="category" placeholder="Write Category Name">
                    <input onclick="return confirm('Reconfirm Submission?')" type="submit" class="btn btn-primary" name="submit" value="Add Category">
                </form>
            </div>
            <table class="center">
                <tr>
                    <td>Category Name</td>
                    <td>Action</td>
                </tr>

                @foreach ($data as $data )
                <tr>
                    <td>{{ $data->category_name }}</td>
                    <td>
                        <a onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger" href="{{ url('delete_category', $data->id) }}">Delete</a>
                    </td>
                </tr>
                @endforeach

            </table>
        </div>
      </div>
    </div>
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>
