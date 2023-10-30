<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function index() {  
        $allPost = Post::latest()->get();

        return view('category',compact('allPost'));
    }
}
