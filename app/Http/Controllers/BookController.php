<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('frontend.accounts.include.add_book', ['categories' => $categories]);
    }

    public function addBook(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'slug' => 'required|string',
            'abstract' => 'required|string',
            'image' => 'required|file',
            'category' => 'required|string'
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => $validator->errors()->first(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        $validExtensions = ["png", "jpg", "jpeg"];
        if (!in_array($request->image->extension(), $validExtensions)) {
            return redirect('/user/dashboard')->with([
                'message' => 'Invalid File Extension',
                'alert-type' =>'error'
            ]);
        }
            $file = $request->image;
            $bookext = time().'.'.$file->getClientOriginalExtension();
            $dest = public_path('/files');
            $file->move($dest,$bookext);
         Book::create([
            'title' => $request->title,
            'author_id' => auth()->id(),
            'slug' => $request->slug,
            'abstract' => $request->abstract,
            'image' => $bookext,
            'category_id' => $request->category
         ]);
         
        $notification = array(
            'message' => 'Book upload Successful',
            'alert-type' => 'success'
        );
        return redirect('/user/dashboard#books')->with($notification);
    }

    public function editBook(Book $book)
    {
        return view('frontend.accounts.include.edit_book', ['book' => $book]);
    }

    public function updateBook(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'slug' => 'required|string',
            'abstract' => 'required|string',
            'image' => 'required|file',
            'category' => 'required|string'
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => $validator->errors()->first(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        $validExtensions = ["png", "jpg", "jpeg"];
                if (!in_array($request->image->extension(), $validExtensions)) {
                    return redirect('/user/dashboard')->with([
                        'message' => 'Invalid File Extension',
                        'alert-type' =>'error'
                    ]);
                }
        $file = $request->image;
        $bookext = time().'.'.$file->getClientOriginalExtension();
        $dest = public_path('/files');
        $file->move($dest,$bookext);

        $book->title = $request->title;
        $book->slug = $request->slug;
        $book->abstract = $request->abstract;
        $book->image = $bookext;
        $book->category = $request->category;
        $book->update();

        $notification = array(
            'message' => 'Book updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/user/dashboard#books')->with($notification);
    }

    public function delete(Book $book)
    {
        if($book->author_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        $book->delete();
        $notification = array(
            'message' => 'Book deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect('/user/dashboard#books')->with($notification);
    }
}
