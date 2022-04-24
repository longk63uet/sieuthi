<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Blog;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
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
        $topRating = DB::table('rating')->select(DB::raw('avg(rating) as rate, product_id'))->groupBy('product_id')->limit(3)->get();
        $topRateProduct = [];
        foreach($topRating as $value){
            $topRateProduct[] = $value->product_id;
        }
        $ratingProduct = DB::table('product')->whereIn('product_id', $topRateProduct)->get();
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
                $product = DB::table('product')->where('product_status','1')->orderBy('product_price', 'ASC')->paginate(15)->appends(request()->query());
            }
            elseif($sort =='az' ){
                $product = DB::table('product')->where('product_status','1')->orderBy('product_price', 'ASC')->paginate(15)->appends(request()->query());
            }
            elseif($sort =='za' ){
                $product = DB::table('product')->where('product_status','1')->orderBy('product_price', 'ASC')->paginate(15)->appends(request()->query());
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
}
