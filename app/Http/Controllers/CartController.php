<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Coupon;
session_start();

class CartController extends Controller
{

    public function addCarts(Request $req){
            $product_id = $req->productid_hidden;
            $product_quantity = $req->quantity;
            $product = DB::table('product')->where('product_id', $product_id)->first();
            $oldCart = Session('cart') ? Session('cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->updateCart($product_id, $product, $product_quantity);
            $req->session()->put('cart', $newCart);
           
            return redirect()->back();
         
    }


    public function deleteCart(Request $req, $product_id){
       $oldCart = Session('cart') ? Session('cart') : null;
       $newCart = new Cart($oldCart);
       $newCart->deleteCart($product_id);
       
       if(count($newCart->products) > 0){
        $req->session()->put('cart', $newCart);
       }
       else{
        $req->session()->forget('cart');
       }       
        return view('show_cart_ajax');
    }

    

    public function addCart(Request $req, $product_id)
    {
       $product = DB::table('product')->where('product_id', $product_id)->first();
       $oldCart = Session('cart') ? Session('cart') : null;
       $newCart = new Cart($oldCart);
       $newCart->addCart($product, $product_id);
       
       $req->session()->put('cart', $newCart);
       
       return view('show_cart_ajax');
        
    }

    
    public function showCart(){
        $cate = DB::table('category')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $cart = Session::get('cart');
     
        return view('show_cart',['cate'=>$cate, 'cart'=>$cart]);   
    }
    
    
}
