<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class AdminController extends Controller
{
    //Xác thực đăng nhập
    public function authLogin(){
        $user_id = Session::get('user_id');
        if($user_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function index(){
        return view('admin_login');
    }

    public function showDashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    public function loginDashboard(Request $request){
        $validated = $request->validate([
            'email' => 'required||max:255',
            'password' => 'required',
        ]);
        $user_email = $request->email;
        $user_password = md5($request->password);

        $result = DB::table('users')->where('email', $user_email )->where('password', $user_password )->first();
        if($result){
            Session::put('user_name', $result->name);
            Session::put('user_id', $result->id);
             return Redirect::to('/dashboard');
        }
        else{ 
            Session::put('message', "Tài khoản hoặc mật khẩu không chính xác");
            return Redirect::to('/admin');
        }
    }

    public function logOut(){
        Session::put('user_name', null );
        Session::put('user_id', null );
        return Redirect::to('/admin');
    }
    
}
