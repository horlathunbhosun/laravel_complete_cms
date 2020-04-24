<?php

namespace App\Http\Controllers\Backend;

use App\Post;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends BackendController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('name')->paginate($this->limit);
        $userCount = User::count();
        return view('backend.users.index', compact('users', 'userCount'));
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('backend.users.create');
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
            'name'         =>     'required',
            'email'        =>     'email|required|unique:users',
            'password'     =>     'required|confirmed'
        ]);

        $title = $request->title;
        $slug =  str_slug($title, '-');
        $data = $request->only('name', 'email', 'password', 'slug');
        $data['slug'] = $slug;
        $done = New User($data);
        $confirm = $done->save();
        if($confirm){
            toastr()->success('User Created Successfully', 'Success');
            return redirect('/backend/users');
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
        $user = User::findOrFail($id);
        return view('backend.users.edit', compact('user'));
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

        $this->validate($request,[
            'name'         =>     'required',
            'email'        =>     'email|required|unique:users,email',
            'password'     =>     'required_with:password_confirmation|confirmed'
        ]);


        // $user = User::findOrFail($id);
        // $title = $request->title;
        // $slug = str_slug($title, '-');
        // $data = $request->only('title', 'slug');
        // $data['slug'] = $slug;

        // $cat = $user->update($data);
        //  if($cat){
        //     toastr()->success('User Updated Successfully', 'Success');
        //     return redirect('/backend/users');
        //  }
        //     toastr()->error('An error occurred while Updating the User info', 'Error');
        //     return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request,$id)

    {
        $deleteOption = $request->delete_option;
        $selectedUser = $request->selected_user;
        $user = User::findOrFail($id);

        if($deleteOption == "delete"){
            $user->posts()->withTrashed();
            // $image = Post::where('image', $selectedUser);
            // $this->removeImage($image);
            $user->forceDelete();

        }elseif ($deleteOption == "attribute"){
            $user->posts()->update(['author_id' => $selectedUser]);
        }
        $user->delete();
        toastr()->success('User Deleted Successfully', 'Success');
        return redirect('backend/users');

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


    public function confirm($id)

    {
        $user = User::findOrFail($id);
        $users = User::where('id', '!=', $user->id)->pluck('name', 'id');

        return view('backend.users.confirm', compact('user', 'users'));

    }
}
