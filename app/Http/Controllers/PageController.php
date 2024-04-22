<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::orderBy('id','desc')->paginate('5');
        return view('admin.page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        return view('admin.page.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'slug' => 'required|unique:pages',
            'discription' => 'required',

        ]);

        Page::create([
            'name' =>$request->name,
            'slug' =>$request->slug,
            'discription' =>$request->discription,
            'status' =>1,
            'added_on' =>date('y-m-d h:i:s'),
        ]);
        return redirect()->route('index.page')->with('success','Page has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page,$id)
    {
        $page = Page::find($id);
        return view('admin.page.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page,$id)
    {
        $page=Page::find($id);
        $updatePage = ([

            'name' =>$request->name,
            'slug' =>$request->slug,
            'discription' =>$request->discription,
            'status' =>1,
            'added_on' =>date('y-m-d h:i:s'),
        ]);

        $page->update($updatePage);

        return redirect()->route('index.page')->with('success','Page has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Page $page,$id)
    {

        $page = Page::find($id);

        $page->delete();

        return redirect()->route('index.page')->with('success','Page has been deleted successfully');
    }
}
