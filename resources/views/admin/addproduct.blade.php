<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .div_center{
            text-align: center;
            padding-top: 20px;
        }
        .h1_font{
            font-size: 45px;
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
        <div class="div_center">
           <h2 class="h2_font">Add Product</h2>
            <div>
                <label>Product Title</label>
                <input type="text" name="title" placeholder="Write the Product Title" >
            </div>
            <div>
                <label>Prodcut Title</label>
                <input type="text" name="description" placeholder="Write the Product Title" >
            </div>
            <div>
                <label>Prodcut Title</label>
                <input type="text" name="quantity" placeholder="Write the Product Title" >
            </div>
            <div>
                <label>Prodcut Title</label>
                <input type="text" name="category" placeholder="Write the Product Title" >
            </div>
            <div>
                <label>Prodcut Title</label>
                <input type="text" name="price" placeholder="Write the Product Title" >
            </div>
            <div>
                <label>Prodcut Title</label>
                <input type="text" name="discount_price" placeholder="Write the Product Title" >
            </div>
            <div>
                <label>Prodcut Title</label>
                <input type="text" name="image" placeholder="Write the Product Title" >
            </div>

        </div>
       </div>
     </div>
   </div>
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>
