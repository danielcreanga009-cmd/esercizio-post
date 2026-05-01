<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registerForm(){
        return view('register');
    }

    public function loginForm(){
        return view('login');
    }

    public function showHome(){
        $posts = Post::with('user')->get();
        $user = User::find(auth()->id());
        return view('home', compact('posts'), compact('user'));
    }

    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed', 
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('showPosts');
    }


    public function loginUser(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email|',
            'password' => 'required', 
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('showPosts');
        };



        return back()->withErrors([
            'email' => 'Le credenziali fornite non sono corrette.',
        ])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}