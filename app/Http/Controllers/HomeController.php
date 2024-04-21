<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function redirect(){

        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            return view('admin.home');
        }

        else
        {
            $product=Product::paginate(6);
            return view('home.userpage', compact('product'));
        }

    }

    public function index(){
        $product=Product::paginate(6);
        return view('home.userpage', compact('product'));
    }

    public function product_details($id){
        $product=Product::find($id);
        return view('home.productdetails', compact('product'));
    }

    public function add_cart(Request $request, $id){
        if(Auth::id()) {
            $user=Auth::user();
            $product=product::find($id);
            $cart= new cart;

            //getting user data
            $cart->user_id=$user->id;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;

            //getting product data
            $cart->product_id=$product->id;
            $cart->product_title=$product->title;

           //price or discount price
            if($product->discount_price!=null)
            {
                $cart->price=$product->discount_price * $request->quantity;
            }

            else
            {
                $cart->price=$product->price * $request->quantity;
            }

            $cart->image=$product->image;
            //quantity from the home page
            $cart->quantity=$request->quantity;

            $cart->save();

            return redirect()->back()->with('cart', 'Product added to the cart');
        }
        else {

            return redirect()->route('login');//->with('warning', 'You need to log in to add products to your cart.');
        }
    }

    public function show_cart(){
        //don't need to  if(Auth::id()) as it's auto check login by jetstream

        $userid=Auth::user()->id;
        $cart=cart::where('user_id', '=', $userid)->get(); //checking logged user's cart
        return view('home.showcart', compact('cart'));
    }

    public function remove_cartitem($id){


        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cash_pay(){
        $userid = Auth::user()->id;
        $cartItems = cart::where('user_id', $userid)->get(); // Get all cart items for the user

        // Generate a unique track ID
        $track_id = uniqid('tr');

        foreach($cartItems as $cartItem){
            $order = new order;

            // Getting user data
            $order->user_id = $userid;
            $order->name = Auth::user()->name;
            $order->email = Auth::user()->email;
            $order->phone = Auth::user()->phone;
            $order->address = Auth::user()->address;

            // Getting product data
            $order->product_id = $cartItem->product_id;
            $order->product_title = $cartItem->product_title;
            $order->price = $cartItem->price;
            $order->quantity = $cartItem->quantity;
            $order->image = $cartItem->image;

            // Setting track ID for all items in this order
            $order->track_id = $track_id;

            // Status
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';

            // Save the order
            $order->save();

            // Remove cart item
            $cartItem->delete();
        }

        return view('home.thankyou', ['track_id' => $track_id]);
    }

    // Function to handle Stripe payment
    public function stripePayment(Request $request)
    {
        // Retrieve the total price from the query parameters
        $totalPrice = $request->query('totalprice');
        return view('home.stripe', compact('totalPrice'));
    }

    public function stripePost(Request $request)
    {
        $totalPrice = $request->input('totalPrice');

        Stripe::setApiKey(env('STRIPE_SECRET'));

        \Stripe\Charge::create ([
                "amount" => $totalPrice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thank you for payment"
        ]);$userid = Auth::user()->id;
        $cartItems = cart::where('user_id', $userid)->get(); // Get all cart items for the user

        // Generate a unique track ID
        $track_id = uniqid('tr');

        foreach($cartItems as $cartItem){
            $order = new order;

            // Getting user data
            $order->user_id = $userid;
            $order->name = Auth::user()->name;
            $order->email = Auth::user()->email;
            $order->phone = Auth::user()->phone;
            $order->address = Auth::user()->address;

            // Getting product data
            $order->product_id = $cartItem->product_id;
            $order->product_title = $cartItem->product_title;
            $order->price = $cartItem->price;
            $order->quantity = $cartItem->quantity;
            $order->image = $cartItem->image;

            // Setting track ID for all items in this order
            $order->track_id = $track_id;

            // Status
            $order->payment_status = 'paid';
            $order->delivery_status = 'processing';

            // Save the order
            $order->save();

            // Remove cart item
            $cartItem->delete();
        }

        Session::flash('success', 'Payment successful!');

        return view('home.thankyou', ['track_id' => $track_id]);
    }
}
