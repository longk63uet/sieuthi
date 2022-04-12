<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('market');
    }

    public function contact(){
        return view('contact');
    }
}
