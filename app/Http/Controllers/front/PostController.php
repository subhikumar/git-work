<?php

namespace App\Http\Controllers\front;
use App\Models\Post;
use App\Models\Page;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function home(){
        $homes = Post::orderBy('id','desc')->get();
        return view('frontend.homepage',compact('homes'));
    }

    public function post($id){
        $post = Post::where('slug',$id)->first();
        return view('frontend.postpage',compact('post'));

    }

    public function comment()
    {   $comment = Post::orderBy('id','desc')->get();
        return view('frontend.postpage',compact('comment'));
    }

    public function like()
    {   $like = Post::orderBy('id','desc')->get();
        return view('frontend.postpage',compact('like'));
    }

    public function about(){
        $pages = Page::orderBy('id','desc')->get();
        return view('frontend.aboutpage',compact('pages'));
    }


    public function contact()
    {   $contacts = Contact::orderBy('id','desc')->get();
        return view('frontend.contactpage',compact('contacts'));
    }

}
