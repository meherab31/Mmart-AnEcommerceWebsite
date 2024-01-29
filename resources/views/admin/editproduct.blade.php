<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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

            text-align: center;
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
            @if (session('productedited'))
            <div class="alert alert-warning">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('productedited') }}
            </div>
            @endif
           <h2 class="h2_font">Edit Product</h2>
           <form action="{{ url('/product_edited', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-container">
                    <div>
                        <label>Product Title</label>
                        <input required type="text" name="title" placeholder="Write the Product Title" value="{{ $product->title }}">
                    </div>
                    <div>
                        <label>Product Description</label>
                        <input required type="text" name="description" placeholder="Write the Product Description" value="{{ $product->description }}">
                    </div>
                    <div>
                        <label>Product Quantity</label>
                        <input required type="number" name="quantity" min="0" placeholder="Place Product Quantity" value="{{ $product->quantity}}">
                    </div>
                    <div>
                        <label>Product Category</label>
                        <select  required name="category">
                            <option value="{{ $product->category }}" selected="">{{ $product->category }}</option>
                            @foreach ($category as $category)
                                <option value="{{ $category->category_name}}">{{ $category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Product Price</label>
                        <input required type="number" name="price" placeholder="Place the product price" value="{{ $product->price }}">
                    </div>
                    <div>
                        <label>Product Discount price</label>
                        <input type="number" name="discount_price" placeholder="Write the Discounted Product Price" value="{{ $product->discount_price }}">
                    </div>
                    <div>
                        <label>Current Product Image</label>
                        <img height="100" width="100" src="/product/{{ $product->image }}">
                    </div>
                    <br>
                    <div>
                        <label>Product Image</label>
                        <input type="file" name="image" placeholder="Upload the Product Image">
                    </div>
                    <div class="submit">
                        <input onclick="return confirm('Reconfirm Submission?')" type="submit" value="Edit Product" class="btn btn-warning">
                    </div>
                </div>
          </form>
        </div>
       </div>
     </div>
   </div>
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>
