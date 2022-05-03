<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    //Gửi feedback
    public function sendFeedback(Request $request){
        $feedback = new Feedback();
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->phone = $request->phone;
        $feedback->order_id = $request->order_id;
        $feedback->feedback = $request->feedback;
        $feedback->save();

        return redirect()->back();
    }

    //Quản lý feedback
    public function manageFeedback(){
        $feedbacks = Feedback::orderBy('status', 'DESC')->get();

        return view('admin.manage_feedback', ['feedbacks' => $feedbacks]);
    }

    //Xử lý feedback
    public function handleFeedback($feedback_id){
        $feedback = Feedback::find($feedback_id);
        $feedback->status = 1;
        $feedback->save();
        
        return redirect()->back();
    }

}
