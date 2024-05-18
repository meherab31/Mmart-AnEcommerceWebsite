<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailMail; // Import the Mailable class
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

        $product = Product::find($order->product_id);
        // Check if the product quantity is sufficient
        if ($product->quantity >= $order->quantity) {
            // Reduce product quantity
            $product->quantity -= $order->quantity;
            $product->save();

            // Check if product is out of stock
            if ($product->quantity <= 0) {
                $message = "Stock Out";
            } else {
                $message = "Product Delivered Successfully";
            }
        }
        return redirect()->back()->with('message', $message);
    }

    public function showOrders()
    {
        // Fetch the 15 most recent orders in descending order based on ID
        $orders = Order::orderBy('id', 'desc')->paginate(15);
        $totalQuantity = Order::sum('quantity');
        $totalEarnings = Order::where('payment_status', 'paid')->sum('price');

        return view('admin.showorders', compact('orders', 'totalQuantity', 'totalEarnings'));
    }

    public function salesReport(){
        $orders = order::all();
        $totalQuantity = Order::sum('quantity');
        $totalEarnings = Order::where('payment_status', 'paid')->sum('price');

        return view('admin.salesreport', compact('orders', 'totalQuantity', 'totalEarnings'));
    }

    public function downloadReport(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if ($startDate && $endDate) {
            // Retrieve orders within the date range
            $orders = Order::whereBetween('created_at', [$startDate, $endDate])->get();
            $totalQuantity = $orders->sum('quantity');
            $totalEarnings = $orders->sum('price');
        } else {
            // Retrieve all orders
            $orders = Order::all();
            $totalQuantity = $orders->sum('quantity');
            $totalEarnings = $orders->sum('price');
        }

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

    public function sendEmail($id){

        $order = Order::find($id);

        return view('admin.sendemail', compact('order'));
    }

    public function sentEmail(Request $request, $orderId)
    {
        // Validate the form data
        $request->validate([
            'subject' => 'required',
            'body' => 'required',
            'attachment' => 'nullable|file|max:10240', // Maximum file size: 10MB
        ]);

        // Retrieve the order details from the database based on $orderId
        $order = Order::find($orderId);

        // Retrieve the email address from the form
        $toEmail = $order->email;

        // Retrieve the subject and body from the form
        $subject = $request->input('subject');
        $body = $request->input('body');

        // Check if an attachment was provided
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');

            // Store the attachment in a directory
            $attachmentPath = $attachment->store('attachments');

            // Get the absolute path
            $attachmentAbsolutePath = storage_path('app/' . $attachmentPath);
        } else {
            $attachmentPath = null;
            $attachmentAbsolutePath = null;
        }

        // Send the email using the Mailable class
        Mail::to($toEmail)->send(new SendEmailMail($subject, $body, $attachmentAbsolutePath));


        // Redirect back with a success message
        return back()->with('success', 'Email sent successfully.');
    }


}
