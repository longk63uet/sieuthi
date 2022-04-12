<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function manageBlog(){
        $blog = Blog::all();
        return view('admin.manage_blog')->with(compact('blog'));  
    }

    public function blogs(){
        return view('blogs');
    }
}