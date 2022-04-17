<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BlogController extends Controller
{
    public function manageBlog(){
        $blog = Blog::all();
        return view('admin.manage_blog')->with(compact('blog'));  
    }

    public function blogs(){
        return view('blogs');
    }

    public function insertBlog(){
        return view('admin.add_blog');  
    }

    public function addBlog(Request $request){
        $data = array();
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        $data['status'] = $request->status;
        $data['user_id'] = Session::get('user_id') ? Session::get('user_id') : 1;
        
        $get_image = $request->file('images');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/blog',$new_image);
            $data['images'] = $new_image;
            DB::table('blogs')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('all-product');
        }
        $data['images'] = '';
        DB::table('blogs')->insert($data);
        Session::put('message', "Thêm Blog thành công");
        return Redirect::to('/manage-blog');
    }

}