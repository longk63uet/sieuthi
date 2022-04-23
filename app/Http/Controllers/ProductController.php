<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Rating;
session_start();

class ProductController extends Controller
{
    //admin
    public function authLogin(){
        $admin_id = Session::get('user_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function addProduct(){
        $this->AuthLogin();
        $cate = DB::table('category')->orderBy('category_id','desc')->get();
        return view('admin.add_product',['cate'=>$cate]);
    }

    public function editProduct(Request $request, $product_id ){
        $cate = DB::table('category')->orderBy('category_id','desc')->get();
        $data = DB::table('product')->where('product_id', $product_id)->get();
        return view('admin.edit_product',['data' => $data, 'cate'=>$cate] );
    }

    public function deleteProduct($product_id ){
        $data = DB::table('product')->where('product_id', $product_id)->delete();
        Session::put('message', "Xóa sản phẩm thành công");
        return Redirect::to('/all-product');
    }

    public function updateProduct(Request $request, $product_id ){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        
        $data['product_price'] = $request->product_price;
        $data['product_detail'] = $request->product_detail;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        
        if($get_image){
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('public/uploads/product',$new_image);
                    $data['product_image'] = $new_image;
                    DB::table('product')->where('product_id',$product_id)->update($data);
                    Session::put('message','Cập nhật sản phẩm thành công');
                    return Redirect::to('all-product');
        }
            
        DB::table('product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');

    }

    public function saveProduct(Request $request){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_detail'] = $request->product_detail;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->category_id;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('all-product');
        }
        $data['product_image'] = '';
        DB::table('product')->insert($data);
        Session::put('message', "Thêm sản phẩm thành công");
        return Redirect::to('/all-product');
    }

    public function allProduct(){
        $all_product = DB::table('product')
        ->join('category','category.category_id','=','product.category_id')
        ->orderby('product.product_id','desc')->get();
    	return view('admin.all_product')->with('all_product', $all_product);
    }
    
    //user

    public function detailProduct($product_id){
        $cate = DB::table('category')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $product = DB::table('product')
        ->join('category','category.category_id','=','product.category_id')
        ->where('product.product_id',$product_id)->get();

        foreach($product as $pro){
            
            $related = $pro->category_id;
        }
        $pro = Product::where('product_id', $product_id)->first();
        $pro->view = $pro->view + 1;
        $pro->save();
        $relatedProduct = DB::table('product')
        ->join('category','category.category_id','=','product.category_id')
        ->where('product.category_id',$related)
        ->whereNotIn('product.product_id',[$product_id])
        ->limit(4)->get();

        $rating = Rating::where('product_id', $product_id)->avg('rating');
        $rating = round($rating);
        return view('pages.detail_product',['cate'=>$cate, 'rating'=>$rating,'product'=>$product,'relatedProduct'=>$relatedProduct]);
    }

    public function loadComment(Request $request){
        $product_id = $request->product_id;
        // $comments = DB::table('comment')->where('product_id', $product_id)->get();
        $comments =  Comment::where('product_id', $product_id)->get();
        $output = '';
        foreach($comments as $comment){
            $output .= '<div class="row mt-2 ml-2" style="border: 1px solid #ddd; border-radius: 10px; background:rgb(188, 183, 183)">
            <div class="col-sm-2">
                
                <img width="100%" src="" alt="" class="img img-responsive img-thumbnail">
            </div>
            <div class="col-sm-10">
                <p style="color: blue">' .$comment->name  .'</p>
                <p>' .  $comment->comment  . '</p> </div> </div> ';
        }
        return $output;
    }


        public function sendComment(Request $request){
            $product_id = $request->product_id;
            $comment_name = $request->comment_name;
            $comment_content = $request->comment_content;
            
            $comment = new Comment();
            $comment->product_id = $product_id;
            $comment->name = $comment_name;
            $comment->comment = $comment_content;
            $comment->save();


        }
        public function rating(Request $request){
            $rating = new Rating();
            $rating->product_id = $request->product_id;
            $rating->rating = $request->index;
            $rating->save();
            return 'done';
        }

}
