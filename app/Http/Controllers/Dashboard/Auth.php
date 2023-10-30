<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Testing\Fluent\Concerns\Has;

class Auth extends Controller
{
    public function login(){
        return view('dashboard.login');
    }

    public function register(){
        return view('dashboard.register');
    }

    public function userLogin(Request $request){
        $request->validate([
            'email'       =>'required|email',
            'password'       =>'required|min:6',
        ]);

        $user = User::where('email', '=',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId',$user->id);
                $request->session()->put('name',$user->name);
                return redirect()->route('dashboard');
            }else{
                return back()->with('fail','Email Or Password is wrong'); 
            }
        }else{
            return back()->with('fail','This email is not registered');
        }
    }

    public function userRegister(Request $request){
        $request->validate([
            'name'       =>'required',
            'email'       =>'required|email|unique:users',
            'password'       =>'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $result = $user->save();
        if($result){
            return back()->with('success','You are registered successfully');
        }else{
            return back()->with('fail','Something went wrong');
        }
    }

    public function dashboard(){
        $posts = Post::count();
        $sliders = Slider::count();
        return view('dashboard.index',compact('posts','sliders'));
    }

    public function logout() {
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }

}
