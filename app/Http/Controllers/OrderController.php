<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Shipping;
use Illuminate\Support\Facades\App;
use App\Models\Coupon;

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
        ->join('users','order.user_id','=','users.id')
        ->select('order.*','users.name')
        ->orderby('order.order_id','desc')->get();
        return view('admin.manage_order')->with('all_order',$all_order);
    }
    public function viewOrder($orderId){
        $order_details = OrderDetail::with('product')->where('order_id',$orderId)->get();
		$order = Order::where('order_id',$orderId)->get();
		foreach($order as $key => $ord){
			$user_id = $ord->user_id;
			$shipping_id = $ord->shipping_id;
			$order_status = $ord->order_status;
		}
		$user = User::where('id',$user_id)->first();
		$shipping = Shipping::where('shipping_id',$shipping_id)->first();

		$order_details_product = OrderDetail::with('product')->where('order_id',$orderId)->get();

		// foreach($order_details_product as $key => $order_d){

		// 	$product_coupon = $order_d->product_coupon;
		// }
		// if($product_coupon != 'no'){
		// 	$coupon = Coupon::where('coupon_code',$product_coupon)->first();
		// 	// $coupon_condition = $coupon->coupon_condition;
		// 	// $coupon_number = $coupon->coupon_number;
		// }else{
		// 	$coupon_condition = 2;
		// 	$coupon_number = 0;
		// }
		
		return view('admin.view_order')->with(compact('order_details','user','shipping','order_details','order','order_status'));
    }
	public function printOrder($checkout_code){
		$pdf = App::make('dompdf.wrapper');
		$pdf->loadHTML($this->print_order_convert($checkout_code));
		
		return $pdf->stream();
	}
	public function deleteOrder(Request $request ,$order_id){
		$order = Order::where('order_id',$order_id)->first();
		$order->delete();
		 Session::put('message','Xóa đơn hàng thành công');
        return redirect()->back();

	}
}
