<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $cate = DB::table('category')->where('category_status','1')->orderBy('category_id','desc')->get();
        $product = DB::table('product')->where('product_status','1')->limit(4)->get();
        return view('pages.home',['cate'=>$cate,'product'=>$product]);
    }

    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $search_product = DB::table('product')->where('product_name','like','%'.$keywords.'%')->get(); 

        return view('search',['search_product' => $search_product]);

    }
}
