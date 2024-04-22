<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function commentstore(Request $request,$post){

        $request->validate([
            'comment'=>'required|max:1000',
        ]);

       $comment =new Comment();
       $comment->post_id = $post;
       $comment->user_id = Auth::id();
       $comment->comment = $request->comment;
       $comment-> save();
        return redirect()->back()->with('success','Post Comment created Succesfully');
    }
}
