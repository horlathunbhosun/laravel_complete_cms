<?php

namespace App\Http\Controllers\Backend;

use config;
use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class BlogController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {
        //
        $onlyTrashed = FALSE;

        if(($status = $request->get('status')) && $status == 'trash')
        {
            $posts = Post::onlyTrashed()->with('category', 'author')->latest()->paginate($this->limit);
            $postCount = Post::onlyTrashed()->count();
            $onlyTrashed = TRUE;
        }elseif($status == 'published'){
            $posts = Post::published()->with('category', 'author')->latest()->paginate($this->limit);
            $postCount = Post::published()->count();
        }elseif($status == 'scheduled'){
            $posts = Post::scheduled()->with('category', 'author')->latest()->paginate($this->limit);
            $postCount = Post::scheduled()->count();
        }elseif($status == 'draft'){
            $posts = Post::draft()->with('category', 'author')->latest()->paginate($this->limit);
            $postCount = Post::draft()->count();
        }elseif($status == 'own'){
                $posts = Auth::user()->posts()->with('category', 'author')->latest()->paginate($this->limit);
                $postCount = Auth::user()->posts()->count();
         }
        else{
            $posts = Post::with('category', 'author')->latest()->paginate($this->limit);
            $postCount = Post::count();
        }
        $statuslist = $this->statusList();

        return view('backend.blog.index', compact('posts', 'postCount' , 'onlyTrashed', 'statuslist'));
    }



    private function statusList(){
        return [
                'own' => Auth::user()->posts()->count(),
               'all' => Post::count(),
               'published' => Post::published()->count(),
               'scheduled' => Post::scheduled()->count(),
               'draft' => Post::draft()->count(),
               'trash' => Post::onlyTrashed()->count()
        ];
    }

    public function create()
    {
        //
       return view('backend.blog.create');
    }


    public function store(Request $request)
    {
            $this->validate($request,[
                'title'         =>'required',
               // 'slug'          =>'required|unique:posts',
                'body'          =>'required',
                'category_id'   => 'required',
                'image'         => 'required'
            ]);

            $author = Auth::user()->id;
            $data =  $request->only(['title', 'slug', 'body','excerpt' ,'image', 'published_at', 'category_id', 'author_id']);
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $path = public_path().'/img';
                $success =  $file->move($path, $fileName);
                $data['image'] =  $fileName;
                if($success)
                {
                    $width = config('cms.image.thumbnail.width');
                    $height = config('cms.image.thumbnail.height');
                    $extension = $file->getClientOriginalExtension();
                    $thumbnail =   str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
                    $path = public_path().'/img';
                        Image::make($path . '/' . $fileName)
                        ->resize($width,$height)
                        ->save($path . '/' . $thumbnail);
                }
            }
            $title = $request->title;
            $slug = str_slug($title, '-');
            $data['slug'] = $slug;
            $data['author_id'] = $author;
            $post = new Post($data);
            $confirm = $post->save();
             if($confirm)
             {
                toastr()->success('Blog Post Submitted Successfully', 'Success');
                return redirect('/backend/blog');
              }
              else
              {
                    toastr()->error('An error occurred while submitting', 'Error');
                    return back();
              }
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
        //return view('backend.blog.show');
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
        $post = Post::findOrFail($id);
        return view('backend.blog.edit', compact('post'));
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

        $post = Post::findOrFail($id);

        $this->validate($request,[
            'title'         =>'required',
            'body'          =>'required',
            'category_id'   => 'required',
        ]);
        $data =  $request->only(['title', 'body','excerpt' ,'image', 'published_at', 'category_id', 'author_id']);
        if($request->hasFile('image')){
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $path = public_path().'/img';
        $success =  $file->move($path, $fileName);
        $data['image'] =  $fileName;
        if($success)
           {
                $width = config('cms.image.thumbnail.width');
                $height = config('cms.image.thumbnail.height');
                $extension = $file->getClientOriginalExtension();
                $thumbnail =   str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
                $path = public_path().'/img';
                Image::make($path . '/' . $fileName)
                    ->resize($width,$height)
                    ->save($path . '/' . $thumbnail);
            }
        }
        $author = Auth::user()->id;
        $data['author_id'] = $author;
        $oldImage = $post->image;
        $confirm = $post->update($data);
        if($oldImage !== $post->image)
        {
            $this->removeImage($oldImage);
        }
        if($confirm)
        {
                toastr()->success('Blog Post Updated Successfully', 'Success');
                return redirect('/backend/blog');
        }
        else
        {
                toastr()->error('An error occurred while Updating the post', 'Error');
                return back();
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Post::findOrFail($id)->delete();
        toastr()->warning('Blog Post has been moved to trash', 'info');
        return redirect('/backend/blog');

    }

    public function forceDestroy($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();
        $this->removeImage($post->image);
        toastr()->success('Blog Post has been Deleted Permanently', 'success');
        return redirect('/backend/blog?status=trash');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
         toastr()->success('Blog Post Has been Restored Successfully', 'Success');
        return redirect()->back();
    }

    public function getTrashed()
    {

        $trash = Post::with('category', 'author')->onlyTrashed()->paginate($this->limit);

        return view('backend.blog.trashed', compact('trash'));
    }


    public function removeImage($image)
    {
        if(!empty($image))
        {
            $imagePath = public_path('img'). '/' . $image;
            $ext = substr(strchr($image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $image);
            $thumbnailPath = public_path('img'). '/' . $thumbnail;

            if( file_exists($imagePath) ) unlink($imagePath);
            if( file_exists($thumbnailPath) ) unlink($thumbnailPath);

        }
    }
}
