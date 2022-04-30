<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function generateQrcode($product_id)
    {
    $qrcode_url = url('chi-tiet/'.$product_id); 
      return view('qrcode',['qrcode_url' => $qrcode_url]);
    }
}
