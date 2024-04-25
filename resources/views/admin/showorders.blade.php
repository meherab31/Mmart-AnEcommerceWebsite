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
                    <h1 class="text-center mt-4 mb-4">All Orders</h1>
                    @include('admin.orders')
                </div>
            </div>
        </div>
     </div>
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>
