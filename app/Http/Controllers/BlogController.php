<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        // \DB::enableQueryLog();
        $post = Post::with('author')->get();
            return view('blog.index', compact('post'));
        // dd(\DB::getQueryLog());
    }
}
