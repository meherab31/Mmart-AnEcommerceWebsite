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
        <div class="div_center">
           <h2 class="h2_font">aadda</h2>
        </div>
       </div>
     </div>
   </div>
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>
