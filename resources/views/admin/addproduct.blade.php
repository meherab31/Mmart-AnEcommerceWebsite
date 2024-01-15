<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .div_center {
            text-align: center;
            padding-top: 20px;
        }
        .h1_font {
            font-size: 45px;
            padding-bottom: 40px;
        }
        .form-container {
            display: inline-block;
            text-align: left;
        }
        label {
            width: 200px;
            display: inline-block;
            text-align: left;
        }
        input {
            margin-bottom: 10px;
        }
        input::placeholder{
            font-size: 70%;
        }
        select {
            margin-bottom: 10px;
        }
        .submit{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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
           <div class="form-container">
                <div>
                    <label>Product Title</label>
                    <input type="text" name="title" placeholder="Write the Product Title">
                </div>
                <div>
                    <label>Prodcut Description</label>
                    <input type="text" name="description" placeholder="Write the Product Description">
                </div>
                <div>
                    <label>Prodcut Quantity</label>
                    <input type="number" name="quantity" min="0" placeholder="Place Product Quantity">
                </div>
                <div>
                    <label>Prodcut Category</label>
                    <select>
                        <option value="" selected="">Add a category</option>
                        <option>Shirt</option>
                    </select>
                </div>
                <div>
                    <label>Prodcut Price</label>
                    <input type="number" name="price" placeholder="Place the product price">
                </div>
                <div>
                    <label>Prodcut Discount price</label>
                    <input type="number" name="discount_price" placeholder="Write the Discounted Product Price">
                </div>
                <div>
                    <label>Prodcut Image</label>
                    <input type="text" name="image" placeholder="Upload the Product Image">
                </div>
                <div class="submit">
                    <input type="submit">
                </div>
            </div>
        </div>
       </div>
     </div>
   </div>
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>
