<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

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

            return redirect()->back();
        }
        else {

            return redirect()->route('login');//->with('warning', 'You need to log in to add products to your cart.');
        }
    }


}
