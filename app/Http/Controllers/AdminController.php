<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class AdminController extends Controller
{
    public function authLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
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

    public function dashboard(Request $request){
        $admin_email = $request->email;
        $admin_password = md5($request->password);

        $result = DB::table('admin_table')->where('email', $admin_email )->where('password', $admin_password )->first();
        if($result){
            Session::put('admin_name', $result->name);
            Session::put('admin_id', $result->id);
             return Redirect::to('/dashboard');
        }
        else{ 
            Session::put('message', "Tài khoản hoặc mật khẩu không chính xác");
            return Redirect::to('/admin');
        }
    }

    public function logOut(){
        Session::put('admin_name', null );
        Session::put('admin_id', null );
        return Redirect::to('/admin');
    }
}
