<?php

namespace App\Http\Controllers;

use App\Book;
use App\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChapterController extends Controller
{
    public function createChapter(Book $book)
    {
        return view('backend.books.add_chapter', ['book' => $book]);
    }
    public function addChapter(Request $request, Book $book)
    {
        $book = $book->id;
        $validator = Validator::make($request->all(), [
            'chapter_number' => 'required|string',
            'chapter_title' => 'required|string',
            'chapter_body' => 'required|string'
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => $validator->errors()->first(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
         $chapter = new Chapter();
            $chapter->book_id = $book;
            $chapter->chapter_number = $request->chapter_number;
            $chapter->chapter_title = $request->chapter_title;
            $chapter->chapter_body = $request->chapter_body;
        $chapter->save();
        $chapter->book()->attach($book);
        $notification = array(
            'message' => 'Chapter Added Successfully',
            'alert-type' => 'success'
        );
        return redirect('/view-book'. '/' .$book)->with($notification);
    }
    public function editChapter(Chapter $chapter)
    {
        return view('backend.books.view_chapter', ['chapter' => $chapter]);
    }
    public function updateChapter(Request $request, Chapter $chapter)
    {
        $validator = Validator::make($request->all(), [
            'chapter_number' => 'required|string',
            'chapter_title' => 'required|string',
            'chapter_body' => 'required|string'
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => $validator->errors()->first(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        $chapter->chapter_number = $request->chapter_number;
        $chapter->chapter_title = $request->chapter_title;
        $chapter->chapter_body = $request->chapter_body;
        $chapter->update();
        $notification = array(
            'message' => 'Chapter Updated Successful',
            'alert-type' => 'success'
        );
        return redirect('/view-chapter'. '/' .$chapter->id)->with($notification);
    }
    public function deleteChapter(Book $book, Chapter $chapter)
    {
        $book = $book->id;
        $chapter->delete();
        $chapter->book()->detach($book);
        $notification = array(
            'message' => 'Chapter Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect('/view-book'. '/' .$book)->with($notification);
    }
}
