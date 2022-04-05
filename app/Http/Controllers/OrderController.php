<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class OrderController extends Controller
{
    //admin
    public function authLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function manageOrder(){
        $this->AuthLogin();
        $all_order = DB::table('order')
        ->join('customers','order.customer_id','=','customers.customer_id')
        ->select('order.*','customers.customer_name')
        ->orderby('order.order_id','desc')->get();
        return view('admin.manage_order')->with('all_order',$all_order);
    }
    public function viewOrder($orderId){
        $this->AuthLogin();
        $order_by_id = DB::table('order')
        ->join('customers','order.customer_id','=','customers.customer_id')
        ->join('shipping','order.shipping_id','=','shipping.shipping_id')
        ->join('order_details','order.order_id','=','order_details.order_id')
        ->select('order.*','customers.*','shipping.*','order_details.*')->first();
        return view('admin.view_order')->with('order_by_id',$order_by_id);
        
    }
}
