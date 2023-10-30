<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\Slider;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::select('image')->where('status',1)->get();
        $singlePost = Post::limit(4)->latest()->get();
        $posts = Post::all();
        return view('home',compact('posts','singlePost','sliders'));
    }
}
