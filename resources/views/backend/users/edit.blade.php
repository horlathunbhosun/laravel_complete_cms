@extends('layouts.backend.main')


@section('title', 'MyBlog | Edit Category')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Edit Category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('users.index')}}">User</a></li>
        <li class="active">Edit Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          {!! Form::model($user, ['method'=>'PUT', 'action'=>['Backend\UsersController@update', $user->id], 'id'=>'user-form' ]) !!}
          <div class="col-md-8">
            <div class="box">
                {{-- <div class="box-header">
                    <div class="pull-left">
                        <p>The Form</p>
                    </div>
                </div> --}}
              <!-- /.box-header -->
                  <div class="box-body ">
                    <div class="form-group @error('name') is-invalid @enderror">
                        {!! Form::label('Name') !!}
                        {!! Form::text('name', null, ['class'=>'form-control ', 'placeholder'=>'Enter Name']) !!}

                        @error('name')
                            <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('email') is-invalid @enderror">
                        {!! Form::label('email') !!}
                        {!! Form::text('email', null, ['class'=>'form-control ', 'placeholder'=>'Enter Email']) !!}

                        @error('email')
                            <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('password') is-invalid @enderror">
                        {!! Form::label('password') !!}
                        {!! Form::password('password',['class'=>'form-control ', 'placeholder'=>'Enter Password']) !!}

                        @error('password')
                            <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('password_confirmation') is-invalid @enderror">
                        {!! Form::label('password_confirmation') !!}
                        {!! Form::password('password_confirmation',['class'=>'form-control ', 'placeholder'=>'Enter Password']) !!}

                        @error('password')
                            <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- <div class="form-group @error('bio') is-invalid @enderror">
                        {!! Form::label('bio') !!}
                        {!! Form::textarea('bio', null, ['class'=>'form-control ', 'placeholder'=>'Enter The Bio']) !!}

                        @error('bio')
                            <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                        @enderror
                    </div> --}}


                        <div class="box-footer clearfix">
                            {{--  <div class="pull-left">

                            </div>  --}}
                            <div class="pull-left">
                              {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                              <a href="{{ url('backend/categories')}}" class="btn btn-default">Cancel</a>

                            </div>
                        </div>
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

