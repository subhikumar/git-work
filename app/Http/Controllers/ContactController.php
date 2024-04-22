<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $contacts = Contact::orderBy('id','desc')->get();
        return view('admin.contact.index',compact('contacts'));
    }



    public function storeContact(Request $request)
    {
        // dd($request->all());
        $request->validate([

            'user_name'=> 'required',
            'email'=> 'required',
            'mobile'=> 'required',
            // 'message'=> 'required',
        ]);

        Contact::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'message' => $request->message,
            'added_on' =>date('y-m-d h:i:s'),
        ]);

        return redirect()->route('contact')->with('success','Form has been Submitted.');
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact,$id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.edit',compact('contact'));
    }

    public function update(Request $request, Contact $contact,$id)
    {
        $contact=Contact::find($id);
        $updateContact = ([

            'user_name' =>$request->user_name,
            'email' =>$request->email,
            'mobile' =>$request->mobile,
            'message' =>$request->message,
            'added_on' =>date('y-m-d h:i:s'),
        ]);

        $contact->update($updateContact);

        return redirect()->route('index.contact')->with('success','Contact has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Contact $contact,$id)
    {

        $contact = Contact::find($id);

        $contact->delete();

        return redirect()->route('index.contact')->with('success','Contact has been deleted successfully');
    }
}
