<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function manageComment(){
        $comments = Comment::with('product')->orderBy('id')->get();
      
        return view('admin.manage_comment', ['comments' => $comments]);
    }

    public function deleteComment($id){
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->back();
    }
}
