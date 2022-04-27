<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\Roles;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
   public function manageUser(){
    $user = User::orderBy('id','DESC')->where('role', 1)->paginate(5);
    return view('admin.manage_users')->with(compact('user'));
   }

   public function deleteUser($user_id){
    $user = User::find($user_id);
    $user->delete();
    return redirect()->back();
   }

   public function addUser(){
       return view('admin.add_user');
   }

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

   public function index()
    {
        
        $admin = User::with('roles')->orderBy('admin_id','DESC')->paginate(5);
        return view('admin.users.all_users')->with(compact('admin'));
    }
    public function add_users(){
        return view('admin.users.add_users');
    }
    public function assign_roles(Request $request){
        $data = $request->all();
        $user = User::where('admin_email',$data['admin_email'])->first();
        $user->roles()->detach();
        if($request['author_role']){
           $user->roles()->attach(Roles::where('name','author')->first());     
        }
        if($request['user_role']){
           $user->roles()->attach(Roles::where('name','user')->first());     
        }
        if($request['admin_role']){
           $user->roles()->attach(Roles::where('name','admin')->first());     
        }
        return redirect()->back();
    }
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
