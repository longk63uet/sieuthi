<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Payment;
use App\Models\Coupon;
use App\Models\OrderDetail;
session_start();

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //trang chu
    public function index(){
        $cate = DB::table('category')->where('category_status','1')->orderBy('category_id','desc')->get();
        $product = DB::table('product')->where('product_status','1')->limit(4)->get();
        $banner = Banner::all()->take(2);
        $soldProduct = DB::table('product')->where('product_status','1')->orderBy('sold','desc')->limit(3)->get();
        $topRating = DB::table('rating')->select(DB::raw('avg(rating) as rate, product_id'))->groupBy('product_id')->orderByDesc('rate')->limit(3)->get();
        $topRateProduct = [];
        foreach($topRating as $value){
            $topRateProduct[] = $value->product_id;
        }
        $ratingProduct = DB::table('product')->whereIn('product_id', $topRateProduct)->get();
        // dd($ratingProduct);
        $viewProduct = DB::table('product')->where('product_status','1')->orderBy('view','desc')->limit(3)->get();
        $blogs = Blog::all()->take(3);
        
        return view('pages.home',['cate'=>$cate,'product'=>$product, 'banner'=>$banner, 'soldProduct'=>$soldProduct, 'ratingProduct'=>$ratingProduct, 'viewProduct'=>$viewProduct, 'blogs'=> $blogs]);
    }

    //tim kiem
    
    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $search_product = DB::table('product')->where('product_name','like','%'.$keywords.'%')->get(); 

        return view('search',['search_product' => $search_product]);

    }

    public function market(){
        $cate = DB::table('category')->where('category_status','1')->orderBy('category_id','desc')->get();
        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');

        if(isset($_GET['sort'])){
            $sort = $_GET['sort'];
            if($sort =='up' ){
                $product = DB::table('product')->where('product_status','1')->orderBy('product_price', 'ASC')->paginate(15)->appends(request()->query()); //tránh mất code khi chuyển trang
            }
            elseif($sort =='down' ){
                $product = DB::table('product')->where('product_status','1')->orderBy('product_price', 'DESC')->paginate(15)->appends(request()->query());
            }
            elseif($sort =='az' ){
                $product = DB::table('product')->where('product_status','1')->orderBy('product_name', 'ASC')->paginate(15)->appends(request()->query());
            }
            elseif($sort =='za' ){
                $product = DB::table('product')->where('product_status','1')->orderBy('product_name', 'DESC')->paginate(15)->appends(request()->query());
            }
            
        }
        elseif(isset($_GET['start_price'])){
            $start_price = $_GET['start_price'];
            $end_price = $_GET['end_price'];

            $product = DB::table('product')->whereBetween('product_price', [$start_price, $end_price])->orderBy('product_price', 'ASC')->paginate(15)->appends(request()->query());
        }
        else{
            $product = DB::table('product')->where('product_status','1')->paginate(15);
        }
        return view('market',['cate'=>$cate,'product'=>$product, 'min_price'=>$min_price, 'max_price'=>$max_price]);

    }

    public function contact(){
        return view('contact');
    }

    public function sendMail(){
         //send mail
         $to_name = "Công ty Siêu Thị Xanh";
         $to_email = "linhpn2402@gmail.com";//send to this email
        
      
         $data = array("name"=>"Mail từ tài khoản Khách hàng","body"=>'Mail gửi về vấn về khuyến mại'); //body of mail.blade.php
         
         Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){

             $message->to($to_email)->subject('Test thử gửi mail google');//send this mail with subject
             $message->from($to_email,$to_name);//send from this mail
         });
         // return redirect('/')->with('message','');
         //--send mail
    }

    public function addWishlist($product_id){
        $wishlist = DB::table('wishlist')->get();
        foreach($wishlist as $value){
            if($value->product_id == $product_id){
                return 'error';
            }
        }
        $data = array();
        $data['product_id'] = $product_id;
        DB::table('wishlist')->insert($data);
        return 'success';


    }

    public function showWishlist(){
        $wishlist = DB::table('wishlist')->get();
        $product_id = [];
        foreach ($wishlist as $value) {
            $product_id[] = $value->product_id;
        }
        $productwishlist = DB::table('product')->whereIn('product_id',$product_id)->get();
        return view('wishlist', ['productwishlist'=>$productwishlist]);
    }
    public function removeWishlist($product_id ){
        $data = DB::table('product')->where('product_id', $product_id)->delete();
        return redirect()->back();
    }

    public function login(Request $request){
    	$email = $request->email;
    	$password = md5($request->password);
    	$result = DB::table('users')->where('email',$email)->where('password',$password)->where('role', 1)->first();
        if($result){
            Session::put('user_id', $result->id);
    	    return Redirect::to('/');
        }
        else{
            return redirect()->back();
        }
    	
    

    }
    public function loginUser(){
        return view('login');
    }
    public function logoutUser(){
    	Session::forget('user_id');
    	return Redirect::to('/');
    }

    public function adduser(Request $request){
        $data = array();
        $data['name'] = $request->user_name;
    	$data['user_phone'] = $request->user_phone;
        $data['user_address'] = $request->user_address;
    	$data['email'] = $request->user_email;
    	$data['password'] = md5($request->user_password);

    	$users_id = DB::table('users')->insertGetId($data);

    	Session::put('user_id', $users_id);
    	Session::put('user_name',$request->user_name);

    	return Redirect::to('/login-user');
    }

    public function profile(){
        $users_id = Session::get('user_id');
        $user = User::find($users_id);
        $shipping = DB::table('shipping')
        ->join('users','users.id','=','shipping.user_id')->first();
        // dd($shipping);
        return view('profile', ['user'=>$user, 'shipping'=>$shipping]);
    }

    public function manageOrderUser(){
        $users_id = Session::get('user_id');
        $user = User::find($users_id);
        $orders = DB::table('order')
        ->where('user_id',$users_id)->get();
        return view('manage_order_user', ['user'=>$user, 'orders'=>$orders]);
    }

    public function changeProfile(Request $request){
        $data = $request->all();
        $user = User::find(Session::get('user_id'));
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->user_phone = $data['user_phone'];
        $user->user_address = $data['user_address'];
        $user->save();
        return redirect()->back();

    }
    public function changeShipping(Request $request){
        $data = $request->all();
        $shipping = Shipping::find($data['shipping_id']);
        $shipping->shipping_surname = $data['shipping_surname'];
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_city = $data['shipping_city'];
        $shipping->shipping_town = $data['shipping_town'];
        $shipping->shipping_village = $data['shipping_village'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->save();
        return redirect()->back();

    }

    public function changePassword(){
        return view('change_password');
    }

    public function changePass(Request $request){
        $users_id = Session::get('user_id');
        $user = User::find($users_id);
        
        if($user->password == md5($request->password)){
            $user->password = md5($request->newpassword);
            $user->save();

            Session::put('message',"Đổi mật khẩu thành công");
        }
        else{
            Session::put('message',"Mật khẩu không chính xác");
        }
        return redirect()->back();


    }
    public function cancelOrder($order_id){
        $order = Order::find($order_id);
        $order->order_status = 0;
        $order->save();
        return redirect()->back();

    }

    public function confirmOrder($order_id){
        $order = Order::find($order_id);
        $order->order_status = 3;
        $order->save();
        return redirect()->back();

    }

    public function viewOrderUser($order_id){
        $order_details = OrderDetail::with('product')->where('order_id',$orderId)->get();
		$order = Order::where('order_id',$orderId)->get();
		foreach($order as $key => $ord){
			$user_id = $ord->user_id;
			$shipping_id = $ord->shipping_id;
			$order_status = $ord->order_status;
			$payment_id = $ord->payment_id;
			$coupon = $ord->coupon;
			$order_total = $ord->order_total;
		}
		$user = User::where('id',$user_id)->first();
		$shipping = Shipping::where('shipping_id',$shipping_id)->first();
		$payment = Payment::find($payment_id);
		$coupon = Coupon::find($coupon);
        return view('view_order_user');

    }
}
