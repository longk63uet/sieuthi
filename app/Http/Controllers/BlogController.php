<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function manageBlog(){
        $blog = Blog::orderBy('id','DESC')->paginate(5);
        return view('admin.manage_blog')->with(compact('blog'));  
    }
}