@extends('layouts.backend.main')


@section('title', 'MyBlog | Delete Confirmation')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Delete  User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('blog.index')}}">Blog</a></li>
        <li class="active">Delete Confimation</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          {!! Form::model($user,['method'=>'DELETE', 'route'=>['users.destroy', $user->id],]) !!}
          <div class="col-md-8">
            <div class="box">
              <!-- /.box-header -->
                  <div class="box-body ">
                        <p>You have specified the deletion of this user:</p>
                        <p>ID {{$user->id}}: {{$user->name}} </p>
                        <p>What should be done to the users contents</p>
                        <p>
                            <input type="radio" name="delete_option" id="" value="delete" checked> Delete All Content
                        </p>
                        <p>
                            <input type="radio" name="delete_option" id="" value="attribute"> Attribute content to Other user

                            {!! Form::select('selected_user', $users, null) !!}

                        </p>
                 </div>

                 <div class="box-footer">
                     <button type="submit" class="btn btn-danger">Confirm deletion</button>
                     <a href="{{ route('users.index') }}" class="btn btn-default"> Cancel</a>
                 </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          {!! Form::close() !!}
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection




