<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
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

}
