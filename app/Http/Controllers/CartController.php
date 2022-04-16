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
    // public function saveCart(Request $request){
    //     $cate = DB::table('category')->where('category_status','1')->orderby('category_id','desc')->get(); 
    //     $productId = $request->productid_hidden;
    //     $quantity = $request->quantity;
    //     $product_name = $request->product_name;
    //     $product_price = $request->product_price;
    //     $product_image = $request->product_image;
    //     $cart = Session::get('cart');
    //     $product = DB::table('product')->where('product_id', $productId)->get();
    
    //    $cart = array();
    //    if(isset($cart['id'])){
    //     $cart['id']['quantity'] += $quantity; 
    //    }
    //    else{
    //    $cart['id'] = [
    //         'name' => $product_name,
    //         'price' => $product_price,
    //         'quantity' => $quantity,
    //         'image' => $product_image

    //    ];
    // }
    // Session::put('cart', $cart);

    // return Redirect::to('/show-cart');
    // }

    public function saveCartAll(Request $req){
        // dd($req->data);
        foreach($req->data as $item){
            $oldCart = Session('cart') ? Session('cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->updateItemCart($item['key'], $item['value']);
            $req->session()->put('cart', $newCart);
        }
        // $cate = DB::table('category')->where('category_status','1')->orderby('category_id','desc')->get(); 
        // $cart = Session::get('cart');
     
        // return view('show_cart',['cate'=>$cate, 'cart'=>$cart]);   
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
        // return Redirect::to('/show-cart');
        return view('show_cart_ajax');
    }

    

    public function addCart(Request $req, $product_id)
    {
       $product = DB::table('product')->where('product_id', $product_id)->first();
       $cate = DB::table('category')->where('category_status','1')->orderby('category_id','desc')->get(); 
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
