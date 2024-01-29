<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .div_center {
            text-align: center;
            padding-top: 10px;
        }

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
        .tr_bg{
            background-color: #10a894;
        }

        .h1{
            font-size: 30px;
        }
        .img_size{
            width:150px;
            height: 150px;
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
                <div class="div_center">
                    @if (session('delete'))
                    <div class="alert alert-danger">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ session('delete') }}
                    </div>
                    @endif
                    <h1 class="h1">Show All Products</h1>
                    <table class="tab_center">
                        <tr class="tr_bg">
                            <th> Title </th>
                            <th> Description </th>
                            <th> Category </th>
                            <th> Quantity</th>
                            <th> Price </th>
                            <th> Discount Price </th>
                            <th> Product Image </th>
                            <th> Edit </th>
                            <th> Delete </th>
                        </tr>
                        @foreach ($product as $products )
                        <tr>
                            <td>{{ $products->title }} </td>
                            <td>{{ $products->description }} </td>
                            <td>{{ $products->category }} </td>
                            <td>{{ $products->quantity }} </td>
                            <td>{{ $products->price }} </td>
                            <td>{{ $products->discount_price }} </td>
                            <td>
                            <img class="img_size" src="/product/{{ $products->image }}">
                            </td>
                            <td>
                                <a  role="button" class="btn btn-outline-warning" href="{{ url('edit_product', $products->id) }}">Edit</a>
                            </td>
                            <td>
                                <a  onclick="return confirm('Are you sure you want to delete this?')" role="button" class="btn btn-outline-danger" href="{{ url('delete_product', $products->id) }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
     </div>
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>
