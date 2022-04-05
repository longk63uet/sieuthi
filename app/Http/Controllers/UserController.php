<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   public function manageUser(){
    $user = User::orderBy('id','DESC')->paginate(5);
    return view('admin.manage_users')->with(compact('user'));
   }
}
