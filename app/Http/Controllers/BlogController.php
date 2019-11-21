<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller

{
    protected $limit = 3;
    public function index(){
        // \DB::enableQueryLog();
        $posts = Post::with('author')
                    ->LastestFirst()
                    ->published()
                    ->simplePaginate($this->limit);
            return view('blog.index', compact('posts'));
        // dd(\DB::getQueryLog());
    }
}
