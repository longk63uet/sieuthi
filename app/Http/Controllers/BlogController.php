<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Exports\BlogCategoryExport;
use App\Imports\BlogCategoryImport;
use Excel;
session_start();

class BlogController extends Controller
{
    ////Quản lý danh mục Blog//////
    //Xác thực đăng nhập
    public function authLogin(){
        $admin_id = Session::get('user_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    //Thêm danh mục Blog
    public function addBlogCategory(){
        $this->AuthLogin();
        return view('admin.add_blog_category');
    }

    //Sửa danh mục blog
    public function editBlogCategory($blogcategory_id){
        $this->AuthLogin();
        $data = DB::table('blogcategory')->where('blogcategory_id', $blogcategory_id)->get();
        return view('admin.edit_blog_category',['data' => $data]);
    }

    //Xóa danh mục blog
    public function deleteBlogCategory($blogcategory_id ){
        $this->AuthLogin();
        $data = DB::table('blogcategory')->where('blogcategory_id', $blogcategory_id)->delete();
        Session::put('message', "Xóa danh mục sản phẩm thành công");
        return Redirect::to('/all-blog-category');
    }

    //Cập nhật danh mục blog
    public function updateBlogCategory(Request $request, $blogcategory_id ){
        $data = array();
        $data['blogcategory_name'] = $request->blogcategory;
        $data['blogcategory_status'] = $request->blogcategory_status;

        DB::table('blogcategory')->where('blogcategory_id', $blogcategory_id)->update($data);
        Session::put('message', "Cập nhật danh mục sản phẩm thành công");
        return Redirect::to('/all-blog-category');

    }

    //Lưu danh mục Blog
    public function saveBlogCategory(Request $request){
        $data = array();
        $data['blogcategory_name'] = $request->blogcategory_name;
        $data['blogcategory_status'] = $request->blogcategory_status;

        DB::table('blogcategory')->insert($data);
        Session::put('message', "Thêm danh mục Blog thành công");
        return Redirect::to('/all-blog-category');
    }

    //Quản lý tất cả danh mục blog
    public function allBlogcategory(){
        $data = DB::table('blogcategory')->paginate(5);
        return view('admin.all_blog_category', ['data' => $data]);
    }

    public function export_csvBlogCategory(){
        return Excel::download(new BlogCategoryExport , 'blogcategory_product.xlsx');
    }
    public function import_csvBlogCategory(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new BlogCategoryImport, $path);
        return back();
    }

    /////////////Quản lý blog/////////////////////
    //Tất cả Blog
    public function manageBlog(){
        $blogs = Blog::all()->paginate(5);
        return view('admin.manage_blog')->with(compact('blogs'));  
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