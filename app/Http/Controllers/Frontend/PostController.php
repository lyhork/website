<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Gallery;

class PostController extends Controller
{
    public function index($id){
        $post = Post::where('id',$id)->get();
        $galleries = Gallery::where('post_id',$id)->get();
        return view('post',compact('post','galleries'));
    }
}
