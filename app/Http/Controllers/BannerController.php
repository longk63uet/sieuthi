<?php

namespace App\Http\Controllers;
use App\Models\Banner;

use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function manageBanner(){
        $banner = Banner::orderBy('id','DESC')->paginate(5);
    	return view('admin.manage_banner')->with(compact('banner'));  
    }
}
