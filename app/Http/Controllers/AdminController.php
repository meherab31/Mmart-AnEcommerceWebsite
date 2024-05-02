<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class AdminController extends Controller
{
    public function view_category(){
        $data=category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request){
        $data=new category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('added','Category Addedd Successfully');
    }

    public function delete_category($id){
        $data=category::find($id);
        $data->delete();
        return redirect()->back()->with('delete', 'Category Deleted Successfully');
    }

    public function add_product(){

        $category= category::all();
        return view('admin.addproduct', compact('category'));
    }
    public function product_added(Request $request){
        $product = new product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->category=$request->category;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image=$imagename;

        $product->save();
        return redirect()->back()->with('addedproduct', 'Product Added Successfully');
    }
    public function show_product(){

        $product= product::all();
        return view('admin.showproduct', compact('product'));
    }
    public function delete_product($id){

        $product= product::find($id);
        $product->delete();
        return redirect()->back()->with('delete', 'Product is deleted successfully!');
    }
    public function edit_product($id){

        $product= product::find($id);
        $category=category::all();
        return view('admin.editproduct', compact('product', 'category'));
    }
    public function product_edited(Request $request,$id){

        $product= product::find($id);

        $product->title=$request->title;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->category=$request->category;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;

        $image=$request->image;
        if($image)
        {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image=$imagename;
        }
        $product->save();
        return redirect()->back()->with('productedited', 'Product Edited Succesffully');
    }

    public function orders($id){

        $order = Order::find($id);
        $order->delivery_status="delivered";
        $order->payment_status="paid";
        $order->save();
        return view();
    }

    public function delivery($id){

        $order = Order::find($id);
        $order->delivery_status="delivered";
        $order->payment_status="paid";
        $order->save();
        return redirect()->back();
    }

    public function showOrders()
    {
        // Fetch the 15 most recent orders in descending order based on ID
        $orders = Order::orderBy('id', 'desc')->paginate(15);
        $totalQuantity = Order::sum('quantity');
        $totalEarnings = Order::sum('price');

        return view('admin.showorders', compact('orders', 'totalQuantity', 'totalEarnings'));
    }

    public function salesReport(){
        $orders = order::all();
        $totalQuantity = Order::sum('quantity');
        $totalEarnings = Order::sum('price');

        return view('admin.salesreport', compact('orders', 'totalQuantity', 'totalEarnings'));
    }

    public function downloadReport(){
        $orders = Order::all();
        $totalQuantity = Order::sum('quantity');
        $totalEarnings = Order::sum('price');

        // Create a Dompdf instance
        $pdf = new Dompdf();

        // Load HTML content into Dompdf
        $pdf->loadHtml(view('admin.salesreport', compact('orders', 'totalQuantity', 'totalEarnings'))->render());

        // Set paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Render PDF
        $pdf->render();

        // Return the PDF as a downloadable response
        return $pdf->stream('sales_report.pdf');
    }

    //order reciept

    public function orderReciept($id){

        $order = Order::find($id);

        // Customize the PDF file name based on order details
        $filename = 'order_receipt_' . $order->name . '_' . $order->track_id . '.pdf';

        // Create a Dompdf instance
        $pdf = new Dompdf();

        // Load HTML content into Dompdf
        $pdf->loadHtml(view('admin.ordreciept', compact('order'))->render());

        // Render the PDF
        $pdf->render();

        return $pdf->stream($filename);
    }


}
