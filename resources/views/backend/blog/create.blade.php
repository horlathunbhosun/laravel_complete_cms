@extends('layouts.backend.main')


@section('title', 'MyBlog | Add New Posts')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Add New Post</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('blog.index')}}">Blog</a></li>
        <li class="active">All Post</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
                {{-- <div class="box-header">
                    <div class="pull-left">
                        <p>The Form</p>
                    </div>
                </div> --}}

              <!-- /.box-header -->

              <div class="box-body ">
                    {!! Form::open( ['method'=>'POST', 'action'=>'Backend\BlogController@store','files'=>true, ]) !!}
                        <div class="form-group @error('title') is-invalid @enderror">
                            {!! Form::label('title') !!}
                            {!! Form::text('title', null, ['class'=>'form-control ', 'placeholder'=>'Enter The Title']) !!}

                            @error('title')
                                <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('slug') is-invalid  @enderror ">
                            {!! Form::label('slug') !!}
                            {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder'=>'Enter The Slug']) !!}
                            @error('slug')
                                <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                             @enderror
                        </div>

                        <div class="form-group @error('excerpt') is-invalid @enderror">
                            {!! Form::label('excerpt') !!}
                            {!! Form::textarea('excerpt', null, ['class'=>'form-control', 'placeholder'=>'Enter The Excerpt']) !!}
                            @error('excerpt')
                                <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('body') is-invalid @enderror ">
                            {!! Form::label('body') !!}
                            {!! Form::textarea('body', null, ['class'=>'form-control', 'placeholder'=>'Enter The Body']) !!}
                            @error('body')
                                <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('published_at') is-invalid @enderror">
                            {!! Form::label('published_at', 'Published Date') !!}
                            {!! Form::text('published_at', null, ['class'=>'form-control', 'placeholder'=>'Y-m-d H:i:s']) !!}
                            @error('published_at')
                                 <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                             @enderror
                        </div>

                        <div class="form-group @error('category_id') is-invalid @enderror ">
                            {!! Form::label('category_id', 'Category') !!}
                            {!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['class'=>'form-control', 'placeholder'=>'Choose Category']) !!}

                            @error('category_id')
                            <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                        @enderror
                        </div>

                        <div class="form-group @error('image') is-invalid @enderror ">
                            {!! Form::label('image', 'Image') !!}
                            {!! Form::file('image') !!}

                            @error('image')
                            <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                        @enderror
                        </div>

                        {!! Form::submit('Create New Post', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}

              </div>
              <!-- /.box-body -->

            </div>
            <!-- /.box -->
          </div>
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

