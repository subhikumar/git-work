<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate('5');
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        return view('admin.post.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'short_discr' => 'required',
            'long_discr' => 'required',
            'post_date' => 'required',
        ]);
        // image path show only //

        // $image=$request->file('image')->store('public/post');

        //create image original name //
        $image=$request->file('image');
        $extension=$image->extension();
        $file = time() .'.'. $extension;
        $image->storeAs('public/post',$file);

                    // OR //

        // $file = time().'.'.$request->image->extension();

        // $request->image->move(public_path('storage/post'), $file);
        Post::create([
            'image' => $file,
            'title' =>$request->title,
            'slug' =>$request->slug,
            'short_discr' =>$request->short_discr,
            'post_date' =>$request->post_date,
            'long_discr' =>$request->long_discr,
            'status' =>1,
            'added_on' =>date('y-m-d h:i:s'),
        ]);
        return redirect()->route('index.post')->with('success','Post has been created successfully.');
    }


    public function edit(Post $post,$id)
    {
        $post = Post::find($id);
        return view('admin.post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post,$id)
    {
        // dd($request->all());
        $post = Post::find($id);

        // Initialize $file variable with the current image value from the database
            $file = $post->image;

           // update image original name //
            if($request->hasfile('image')){
                $destination =('public/post/'. $post->image);
                if(File::exists($destination))
                {
                  File::delete($destination);
                }

                $image=$request->file('image');
                $extension=$image->extension();
                $file = time() .'.'. $extension;
                $image->storeAs('public/post',$file);

            }

        $updatePost = ([
            'image' => $file,
            'title' =>$request->title,
            'slug' =>$request->slug,
            'short_discr' =>$request->short_discr,
            'post_date' =>$request->post_date,
            'long_discr' =>$request->long_discr,
            'status' =>1,
            'added_on' =>date('y-m-d h:i:s'),
        ]);

        //dd($updatePost);
        $post->update($updatePost);

        return redirect()->route('index.post')->with('success','Post has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Post $post,$id)
    {

        $post = Post::find($id);

        $post->delete();


        return redirect()->route('index.post')->with('success','Post has been deleted successfully');
    }


}
