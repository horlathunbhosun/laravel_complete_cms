<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller

{
    protected $limit = 3;
    public function index(){
        // \DB::enableQueryLog();
          $posts = Post::with('author')
                    ->LastestFirst()
                    ->published()
                    ->simplePaginate($this->limit);

//                var_dump($posts);


            // return Inertia::render('HomeComponent');
           return view('frontend.home.index', compact('posts'));
        // dd(\DB::getQueryLog());
    }



    

    public function category(Category $category){

        $categoryName = $category->title;
        //   \DB::enableQueryLog();
            $posts = $category->posts()
                        ->with('author')
                        ->orderBy('published_at', 'desc')
                        ->where("published_at", "<=", Carbon::now())
                        ->simplePaginate($this->limit);

        return view('blog.index', compact('posts',  'categoryName'));
        //   dd(\DB::getQueryLog());
    }


    public function author(User $author){
        // echo 'test';

        $authorName = $author->name;

        $posts = $author->posts()
                        ->with('category')
                        ->orderBy('published_at', 'desc')
                        ->where("published_at", "<=", Carbon::now())
                        ->simplePaginate($this->limit);
       return view('blog.index', compact('posts', 'authorName'));
    }

    public function show(Post $post, $slug)
    {
        //update post  set view_count = view_count + 1 where id = ?
        #1

        // $viewCount = $post->view_count + 1;
        // $post->update(['view_count' => $viewCount]);
        // $post->;
        $post = Post::published()->where('slug',$slug)->increment('view_count', 1);
        $posts = Post::published()->where('slug',$slug)->first();
        dd($posts);
        return view('blog.show', compact('posts'));
    }
}
