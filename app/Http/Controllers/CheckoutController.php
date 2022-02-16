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
    public function addCustomer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
    	$data['customer_phone'] = $request->customer_phone;
    	$data['customer_email'] = $request->customer_email;
    	$data['customer_password'] = md5($request->customer_password);

    	$customer_id = DB::table('customers')->insertGetId($data);

    	Session::put('customer_id',$customer_id);
    	Session::put('customer_name',$request->customer_name);
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
    	
		

    	return Redirect::to('/payment');

    }

    public function payment(){
        return view('payment');
    }
    public function logoutCheckout(){
    	Session::forget('customer_id');
    	return Redirect::to('/');
    }
    public function loginCustomer(Request $request){
    	$email = $request->email;
    	$password = md5($request->password);
    	$result = DB::table('customers')->where('customer_email',$email)->where('customer_password',$password)->first();
    	
    	
    	if($result){
           
    		Session::put('customer_id',$result->customer_id);
    		return Redirect::to('/checkout');
    	}else{
    		return Redirect::to('/login-checkout');
    	}
        Session::save();

    }
}
