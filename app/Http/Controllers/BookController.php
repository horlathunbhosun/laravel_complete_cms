<?php

namespace App\Http\Controllers;

use App\Book;
use App\Chapter;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category', 'author')->latest()->paginate(5);
        $booksCount = Book::count();

        return view('backend.books.all_books', ['books' => $books, 'booksCount' => $booksCount]);
    }
    public function create()
    {
        return view('backend.books.create');
    }
    public function showBook(Book $book)
    {
        return view('backend.books.show', ['book' => $book]);
    }
    public function viewBook(Book $book)
    {
        return view('frontend.home.book-details', ['book' => $book]);
    }
    public function viewChapter(Book $book, Chapter $chapter)
    {
        return view('frontend.home.chapter-details', ['chapter' => $chapter, 'book' => $book]);
    }
    public function addBook(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'required|file',
            'category_id' => 'required|string'
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
            return redirect('/home')->with([
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
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'image' => $bookext,
            'category_id' => $request->category_id,
            'published_at' => $request->published_at
         ]);
         
        $notification = array(
            'message' => 'Book upload Successful',
            'alert-type' => 'success'
        );
        return redirect(route('view.books'))->with($notification);
    }

    public function editBook(Book $book)
    {
        // return 'hello';
        return view('backend.books.edit', ['book' => $book]);
    }

    public function updateBook(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'required|file',
            'category_id' => 'required|string'
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
                    return redirect('/home')->with([
                        'message' => 'Invalid File Extension',
                        'alert-type' =>'error'
                    ]);
                }
        $file = $request->image;
        $bookext = time().'.'.$file->getClientOriginalExtension();
        $dest = public_path('/files');
        $file->move($dest,$bookext);

        $book->title = $request->title;
        $book->slug = Str::slug($request->title);
        $book->body = $request->body;
        $book->image = $bookext;
        $book->category_id = $request->category_id;
        $book->published_at = $request->published_at;
        $book->update();

        $notification = array(
            'message' => 'Book updated Successfully',
            'alert-type' => 'success'
        );
        return redirect(route('view.books'))->with($notification);
    }

    public function delete(Book $book)
    {
        if($book->author_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        $chapter = Chapter::where('book_id', $book->id);
        $chapterId = $chapter->pluck('id');
        $book->delete();
        $chapter->delete();
        $book->chapter()->detach($chapterId);
        $notification = array(
            'message' => 'Book deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect(route('view.books'))->with($notification);
    }
}
