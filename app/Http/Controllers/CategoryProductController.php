<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Excel;
use App\Imports\Imports;
use App\Exports\Export;

session_start();
class CategoryProductController extends Controller
{
    //admin
    //Xác thực đăng nhập
    public function authLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    //Thêm danh mục sản phẩm
    public function addCategory(){
        $this->AuthLogin();
        return view('admin.add_category');
    }

    //Sửa danh mục sản phẩm
    public function editCategory(Request $request, $category_id ){
        $this->AuthLogin();
        $data = DB::table('category')->where('category_id', $category_id)->get();
        return view('admin.edit_category',['data' => $data]);
    }

    //Xóa danh mục sản phẩm
    public function deleteCategory($category_id ){
        $this->AuthLogin();
        $data = DB::table('category')->where('category_id', $category_id)->delete();
        Session::put('message', "Xóa danh mục sản phẩm thành công");
        return Redirect::to('/all-category');
    }

    //Cập nhật danh mục sản phẩm
    public function updateCategory(Request $request, $category_id ){
        $data = array();
        $data['category_name'] = $request->category;
        $data['category_status'] = $request->category_status;

        DB::table('category')->where('category_id', $category_id)->update($data);
        Session::put('message', "Cập nhật danh mục sản phẩm thành công");
        return Redirect::to('/all-category');

    }

    //Lưu danh mục sản phẩm
    public function saveCategory(Request $request){
        $data = array();
        $data['category_name'] = $request->category;
        $data['category_status'] = $request->category_status;

        DB::table('category')->insert($data);
        Session::put('message', "Thêm danh mục sản phẩm thành công");
        return Redirect::to('/all-category');
    }

    //Quản lý danh mục sản phẩm
    public function allCategory(){
        $data = DB::table('category')->get();
        return view('admin.all_category', ['data' => $data]);
    }

    //Xuất excel danh mục sản phẩm
    public function export_csv(){
        return Excel::download(new Export , 'category_product.xlsx');
    }

    //Nhập danh mục sản phẩm
    public function import_csv(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new Imports, $path);
        return back();
    }

    /////////////user////////////
    //Hiển thị danh mục sản phẩm
    public function showCategoryHome($category_id){
        $cate_product = DB::table('category')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $category_by_id = DB::table('product')->join('category','product.category_id','category.category_id')->where('category.category_id', $category_id)->get();
        $category_name = DB::table('category')->where('category.category_id', $category_id)->limit(1)->get();
        
        return view('pages.show_category',[ 'product'=>$category_by_id, 'cate'=>$cate_product, 'category_name'=>$category_name]);

    }

}
