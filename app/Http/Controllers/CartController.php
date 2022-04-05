<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Coupon;
session_start();

class CartController extends Controller
{
    public function saveCart(Request $request){
        $cate = DB::table('category')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $productId = $request->productid_hidden;
        $quantity = $request->quantity;
        $product_name = $request->product_name;
        $product_price = $request->product_price;
        $product_image = $request->product_image;
        $cart = Session::get('cart');
        $product = DB::table('product')->where('product_id', $productId)->get();
    
       $cart = array();
       if(isset($cart['id'])){
        $cart['id']['quantity'] += $quantity; 
       }
       else{
       $cart['id'] = [
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => $quantity,
            'image' => $product_image

       ];
    }
    Session::put('cart', $cart);

    return Redirect::to('/show-cart');
    }

    public function showCart(){
        $cate = DB::table('category')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $cart = Session::get('cart');
        
        return view('show_cart',['cate'=>$cate, 'cart'=>$cart]);   
    }
    
    public function deleteCart(){
        $cart = Session::put('cart',null);
        return Redirect::to('/');
    }

    

    public function addCart($product_id)
    {
       $product = DB::table('product')->where('product_id', $product_id)->get();
       $cate = DB::table('category')->where('category_status','1')->orderby('category_id','desc')->get(); 
       $cart = Session::get('cart');
       foreach($product as $pro){
           $product_name = $pro->product_name;
           $product_price = $pro->product_price;
           $product_image = $pro->product_image;
       }

       $cart = array();

       if(isset($cart['id'])){
        $cart['id']['quantity'] += 1; 
       }
       else{
       $cart['id'] = [
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => 1,
            'image' => $product_image

       ];
    }
    Session::put('cart', $cart);
    return Redirect::to('/show-cart');
        
    }
    
}
