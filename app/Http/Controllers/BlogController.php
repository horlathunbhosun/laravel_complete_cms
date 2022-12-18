<?php

namespace App\Http\Controllers;

use App\Book;
use App\Post;
use App\User;
use App\Category;
use Carbon\Carbon;
use App\PaymentPlan;
use Inertia\Inertia;
use Illuminate\Http\Request;

class BlogController extends Controller

{
    protected $limit = 3;
    public function index(){
          $posts = Post::with('author')
                    ->LastestFirst()
                    ->published()
                    ->simplePaginate($this->limit);

//                var_dump($posts);

//        $categories = Category::paginate(3);
        $featuredBooksCategoryId = Category::where('title', 'Featured')->pluck('id');
        $featuredBooks = Book::where('category_id', $featuredBooksCategoryId)
                                ->orderBy('created_at', 'desc')
                                ->simplePaginate($this->limit);
        $newArrivalBooksCategoryId = Category::where('title', 'New Arrival')->pluck('id');
        $newArrivalBooks = Book::where('category_id', $newArrivalBooksCategoryId)
                                ->orderBy('created_at', 'desc')    
                                ->simplePaginate($this->limit);
        $completedBooksCategoryId = Category::where('title', 'Completed Books')->pluck('id');
        $completedBooks = Book::where('category_id', $completedBooksCategoryId)
                                ->orderBy('created_at', 'desc')
                                ->simplePaginate($this->limit);

        return view('frontend.home.index', [
            'featuredBooks' => $featuredBooks,
            'newArrivalBooks' => $newArrivalBooks,
            'completedBooks' => $completedBooks
        ]);
    }


    public function membership()
    {

        $payment_plans = PaymentPlan::all();
        return view('frontend.membership.membership',compact('payment_plans'));
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
