<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
}
