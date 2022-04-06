<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function loginCheckout(){
        return view('login');
    }
    public function checkout(){
        return view('checkout');
    }
    public function adduser(Request $request){
        $data = array();
        $data['name'] = $request->user_name;
    	$data['user_phone'] = $request->user_phone;
    	$data['email'] = $request->user_email;
    	$data['password'] = md5($request->user_password);

    	$users_id = DB::table('users')->insertGetId($data);

    	Session::put('user_id', $users_id);
    	Session::put('user_name',$request->user_name);
    	return Redirect::to('/checkout');
    }

    public function saveCheckout(Request $request){
		//shipping
        $data = array();
    	$data['shipping_name'] = $request->shipping_name;
        $data['shipping_surname'] = $request->shipping_surname;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_note'] = $request->shipping_note;
    	$data['shipping_address'] = $request->shipping_address;
        $data['shipping_city'] = $request->shipping_city;
        $data['shipping_town'] = $request->shipping_town;
    	$shipping_id = DB::table('shipping')->insertGetId($data);

    	Session::put('shipping_id',$shipping_id);

        // payment

        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['user_id'] = Session::get('user_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        // $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('order')->insertGetId($order_data);

        //insert order_details

    	return Redirect::to('/payment');

    }

    public function payment(){
        return view('payment');
    }
    
    public function logoutCheckout(){
    	Session::forget('user_id');
    	return Redirect::to('/');
    }
    public function loginuser(Request $request){
    	$email = $request->email;
    	$password = md5($request->password);
    	$result = DB::table('users')->where('email',$email)->where('password',$password)->first();
    	
    	
    	if($result){
           
    		Session::put('user_id',$result->id);
    		return Redirect::to('/checkout');
    	}else{
    		return Redirect::to('/login-checkout');
    	}
        Session::save();

    }
	
}
