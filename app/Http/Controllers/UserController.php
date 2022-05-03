<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\Roles;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    //Quản lý tất cả người dùng khách hàng
   public function manageUser(){
    $user = User::orderBy('id','DESC')->where('role', 1)->paginate(5);

    return view('admin.manage_users')->with(compact('user'));
   }

   //Xóa người dùng
   public function deleteUser($user_id){
    $user = User::find($user_id);
    $user->delete();

    return redirect()->back();
   }

   //Thêm người dùng mới
   public function addUser(){
       return view('admin.add_user');
   }

   //Lưu người dùng mới
   public function insertUser(Request $request){
    $data = $request->all();
        $user = new User();
        $user->name = $data['name'];
        $user->user_phone = $data['phone'];
        $user->user_address = $data['address'];
        $user->email = $data['email'];
        $user->password = md5($data['password']);
        $user->save();
        Session::put('message','Thêm người dùng mới thành công');

        return Redirect::to('manage-user');
    }

    //Lưu người dùng mới
    public function store_users(Request $request){
        $data = $request->all();
        $admin = new User();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->save();
        $admin->roles()->attach(Roles::where('name','user')->first());
        Session::put('message','Thêm users thành công');
        
        return Redirect::to('users');
    }

}
