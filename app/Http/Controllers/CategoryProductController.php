<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryProductController extends Controller
{
    public function addCategory(){
        return view('admin.add_category');
    }

    public function editCategory(Request $request, $category_id ){
        $data = DB::table('category')->where('category_id', $category_id)->get();
        return view('admin.edit_category',['data' => $data]);
    }

    public function deleteCategory($category_id ){
        $data = DB::table('category')->where('category_id', $category_id)->delete();
        Session::put('message', "Xóa danh mục sản phẩm thành công");
        return Redirect::to('/all-category');
    }

    public function updateCategory(Request $request, $category_id ){
        $data = array();
        $data['category_name'] = $request->category;
        $data['category_detail'] = $request->category_detail;
        $data['category_status'] = $request->category_status;

        DB::table('category')->where('category_id', $category_id)->update($data);
        Session::put('message', "Cập nhật danh mục sản phẩm thành công");
        return Redirect::to('/all-category');

    }

    public function saveCategory(Request $request){
        $data = array();
        $data['category_name'] = $request->category;
        $data['category_detail'] = $request->category_detail;
        $data['category_status'] = $request->category_status;

        DB::table('category')->insert($data);
        Session::put('message', "Thêm danh mục sản phẩm thành công");
        return Redirect::to('/all-category');
    }

    public function allCategory(){
        $data = DB::table('category')->get();
        return view('admin.all_category', ['data' => $data]);
    }
}
