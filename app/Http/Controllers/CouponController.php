<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Coupon;
use App\Models\User;
use Carbon\Carbon;
session_start();

class CouponController extends Controller
{
    //Xóa mã giảm giá
	public function unsetCoupon(){
        $coupon = Session::get('coupon');
        if($coupon==true){
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa mã khuyến mãi thành công');
        }
	}

    //Thêm mã giảm giá
    public function insertCoupon(){
    	return view('admin.insert_coupon');
    }

    //Xóa mã giảm giá
    public function deleteCoupon($coupon_id){
    	$coupon = Coupon::find($coupon_id);
    	$coupon->delete();
    	Session::put('message','Xóa mã giảm giá thành công');

        return Redirect::to('manage-coupon');
    }

    //Quản lý mã giảm giá
    public function manageCoupon(){
    	$coupon = Coupon::orderby('coupon_id','DESC')->get();

    	return view('admin.list_coupon')->with(compact('coupon'));
    }

    //Thêm mã giảm giá vào database
    public function addCoupon(Request $request){
    	$data = $request->all();
    	$coupon = new Coupon;
    	$coupon->coupon_name = $data['coupon_name'];
    	$coupon->coupon_discount = $data['coupon_discount'];
    	$coupon->coupon_code = $data['coupon_code'];
    	$coupon->coupon_quantity = $data['coupon_quantity'];
        $coupon->coupon_min = $data['coupon_min'];
        $coupon->coupon_start = $data['coupon_start'];
        $coupon->coupon_end = $data['coupon_end'];
    	$coupon->coupon_condition = $data['coupon_condition'];
    	$coupon->save();
    	Session::put('message','Thêm mã giảm giá thành công');

        return Redirect::to('manage-coupon');
    }

	/////////////////user//////////////////
	//Kiểm tra mã giảm giá
	public function checkCoupon(Request $request){
        $data = $request->all();
        $user_id = Session::get('user_id');
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $coupon = Coupon::where('coupon_code',$data['coupon'])
                ->where('coupon_quantity', '>', 0)
                ->where('coupon_end', '>=', $today)
                ->where('user_id', 1)
                ->orWhere('user_id', $user_id)
                ->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session==true){
                    $is_avaiable = 0;
                    if($is_avaiable==0){
                        $cou[] = array(
                            'coupon_id' => $coupon->coupon_id,
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_discount' => $coupon->coupon_discount,
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                            'coupon_id' => $coupon->coupon_id,
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_discount' => $coupon->coupon_discount,
                        );
                    Session::put('coupon',$cou);
                }
                Session::save();

                return redirect()->back()->with('message','Thêm mã giảm giá thành công');
            }

        }else{
            $request->session()->forget('coupon');

            return redirect()->back()->with('error','Mã giảm giá không đúng hoặc không thể sử dụng');
        }
    }
}
