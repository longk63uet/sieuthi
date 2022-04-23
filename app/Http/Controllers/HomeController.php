<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        return view('pages.home',['cate'=>$cate,'product'=>$product]);
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
}
