<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\City;
use App\Models\Coupon;
use App\Models\District;
use App\Models\Village;
use App\Models\ShippingFee;
session_start();

class CheckoutController extends Controller
{
    
    public function checkout(){
        $city = City::orderby('matp','ASC')->get();
        return view('checkout', compact('city'));
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
        // dd($request->all());
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
        $data['shipping_village'] = $request->shipping_village;
        $data['user_id'] = Session::get('user_id');
    	$shipping_id = DB::table('shipping')->insertGetId($data);

    	Session::put('shipping_id',$shipping_id);

        // payment
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('payment')->insertGetId($data);
        
        //insert order
        $cart = Session::get('cart');
        $order_data = array();
        $order_data['user_id'] = Session::get('user_id');
        $order_data['feeship'] = $request->feeship;
        if(Session::get('coupon')){
            foreach(Session::get('coupon') as $cou){
                $coupon_id = $cou['coupon_id'];
            }
           
            $coupon = Coupon::find($coupon_id);
            $coupon->coupon_quantity -- ;
            $coupon->save();
        }
        $order_data['coupon'] = $request->discount;
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_status'] = 1;
        // dd($request);
        $order_data['order_total'] = $request->price;
        $order_id = DB::table('order')->insertGetId($order_data);

        //insert order details
       
        foreach($cart->products as $carts){
            $order_detail_data['product_quantity'] = $carts['quantity'];
            $order_detail_data['order_id'] = $order_id;
            $order_detail_data['product_id'] = $carts['info']->product_id;
            $order_detail_data['product_name'] = $carts['info']->product_name;
            $order_detail_data['product_price'] = $carts['info']->product_price;
            DB::table('order_details')->insert($order_detail_data);
        }
        $request->session()->flush();

    	return Redirect::to('/payment');

        

    }

    

    public function payment(){
        return view('payment');
    }
    
   
    
    public function selectDelivery(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_district = District::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                    $output.='<option value="" selected>Chọn quận huyện</option>';
                foreach($select_district as $district){
                    $output.='<option value="'.$district->maqh.'">'.$district->name.'</option>';
                }
                

            }else{

                $select_village = Village::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output.='<option>Chọn xã phường</option>';
                foreach($select_village as $village){
                    $output.='<option value="'.$village->xaid.'">'.$village->name.'</option>';
                }
            }
            
        }
        
        return $output;

    }

    
	
}
