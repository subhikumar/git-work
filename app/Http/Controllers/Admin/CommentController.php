<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    public function indexComment(){

        $comments=Comment::orderBy('id','desc')->get();
         return view('admin.comment.index',compact('comments'));

        return redirect()->back()->with('sucess','Comment Successfully deleted');
     }
    public function deleteComment($id){

       $comment=Comment::find($id);
       $comment->delete();

       return redirect()->back()->with('sucess','Comment Successfully deleted');
    }
}
