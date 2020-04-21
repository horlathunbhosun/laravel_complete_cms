<?php

namespace App\Http\Controllers\Backend;
use config;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\CategoryDestroyRequest;

class CategoriesController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::with('posts')->orderBy('title')->paginate($this->limit);

        $categoriesCount = Category::count();

        return view('backend.categories.index',compact('categories', 'categoriesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[
            'title'         =>'required',
        ]);

        $title = $request->title;
        $slug =  str_slug($title, '-');

        $data = $request->only('title', 'slug');
        $data['slug'] = $slug;

        $done = New Category($data);
        $confirm = $done->save();
        if($confirm){
            toastr()->success('Category Created Successfully', 'Success');
            return redirect('/backend/categories');
        }
             toastr()->error('An error occurred while submitting', 'Error');
             return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::findOrFail($id);
        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $category = Category::findOrFail($id);
        $title = $request->title;
        $slug = str_slug($title, '-');
        $data = $request->only('title', 'slug');
        $data['slug'] = $slug;

        $cat = $category->update($data);
         if($cat){
            toastr()->success('Category Updated Successfully', 'Success');
            return redirect('/backend/categories');
         }
            toastr()->error('An error occurred while Updating the post', 'Error');
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\CategoryDestroyRequest $request,$id)

    {
        //

        Category::findorFail($id)->delete();
        toastr()->success('Category Deleted Successfully', 'Success');

    }
}
