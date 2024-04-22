<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthuserController extends Controller
{
    public function register(){
        return view('admin.auth.register');
    }

    public function registerstore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
           ]);

           return redirect()->route('login')->withsuccess(' You have successfully regester');



    }
    public function login(){
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {

        $credentials =$request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    }
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('admin.dashboard');
        }

        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');
        // Auth::logout();

        // // Flash a success message to the session
        // $request->session()->flush('success', 'You have been successfully logged out.');

        // return redirect('/login');
    }
}
