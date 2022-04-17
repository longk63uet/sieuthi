<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Coupon;
session_start();

class CouponController extends Controller
{
	public function unsetCoupon(){
		$coupon = Session::get('coupon');
        if($coupon==true){
          
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa mã khuyến mãi thành công');
        }
	}
    public function insertCoupon(){
    	return view('admin.insert_coupon');
    }
    public function deleteCoupon($coupon_id){
    	$coupon = Coupon::find($coupon_id);
    	$coupon->delete();
    	Session::put('message','Xóa mã giảm giá thành công');
        return Redirect::to('manage-coupon');
    }
    public function manageCoupon(){
    	$coupon = Coupon::orderby('coupon_id','DESC')->paginate(2);
    	return view('admin.list_coupon')->with(compact('coupon'));
    }
    public function addCoupon(Request $request){
    	$data = $request->all();

    	$coupon = new Coupon;

    	$coupon->coupon_name = $data['coupon_name'];
    	$coupon->coupon_discount = $data['coupon_discount'];
    	$coupon->coupon_code = $data['coupon_code'];
    	$coupon->coupon_quantity = $data['coupon_quantity'];
    	$coupon->coupon_condition = $data['coupon_condition'];
    	$coupon->save();

    	Session::put('message','Thêm mã giảm giá thành công');
        return Redirect::to('manage-coupon');


    }

	//user 
	
	public function checkCoupon(Request $request){
        $data = $request->all();
        $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session==true){
                    $is_avaiable = 0;
                    if($is_avaiable==0){
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_discount' => $coupon->coupon_discount,

                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_discount' => $coupon->coupon_discount,

                        );
                    Session::put('coupon',$cou);
                }
                Session::save();
                // dd(Session::get('coupon'));
                return redirect()->back()->with('message','Thêm mã giảm giá thành công');
            }

        }else{
            $request->session()->forget('coupon');
            return redirect()->back()->with('error','Mã giảm giá không đúng');
        }
    }
}
