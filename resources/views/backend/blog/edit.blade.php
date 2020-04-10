@extends('layouts.backend.main')


@section('title', 'MyBlog | Edit Post')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Edit Post</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('blog.index')}}">Blog</a></li>
        <li class="active">Edit Post</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          {!! Form::model($post, ['method'=>'PUT', 'action'=>['Backend\BlogController@update', $post->id],'files'=>true, 'id'=>'post-form' ]) !!}
          <div class="col-md-9">
            <div class="box">
                {{-- <div class="box-header">
                    <div class="pull-left">
                        <p>The Form</p>
                    </div>
                </div> --}}

              <!-- /.box-header -->

              <div class="box-body ">
                        <div class="form-group @error('title') is-invalid @enderror">
                            {!! Form::label('title') !!}
                            {!! Form::text('title', null, ['class'=>'form-control ', 'placeholder'=>'Enter The Title']) !!}

                            @error('title')
                                <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group excerpt @error('excerpt') is-invalid @enderror">
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
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <div class="col-md-3">
            <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Publish</h3>
                  </div>
                  <div class="box-body">
                    <div class="form-group @error('published_at') is-invalid @enderror">
                      {!! Form::label('published_at', 'Published Date') !!}
                      <div class="input-group date" id="datetimepicker1">
                          {!! Form::text('published_at', null, ['class'=>'form-control', 'placeholder'=>'Y-m-d H:i:s']) !!}
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calender"></span>
                          </span>
                      </div>
                      @error('published_at')
                           <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                       @enderror
                  </div>
                  </div>
                  <div class="box-footer clearfix">
                      <div class="pull-left">
                          <button id="draft-btn" class="btn btn-adn"> Save Draft</button>
                      </div>
                      <div class="pull-right">
                        {!! Form::submit('Publish', ['class'=>'btn btn-primary']) !!}
                      </div>
                  </div>
            </div>

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Category</h3>
                </div>
                <div class="box-body">
                    <div class="form-group @error('category_id') is-invalid @enderror ">
                      {!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['class'=>'form-control', 'placeholder'=>'Choose Category']) !!}
                      @error('category_id')
                      <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                     @enderror
                   </div>
                </div>
            </div>
         <div class="box">
                <div class="box-header">
                    <h3 class="box-title with-border">
                      Featured Image
                    </h3>
                    <div class="box-body text-center">
                      <div class="form-group @error('image') is-invalid @enderror ">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                              <img src="{{($post->image_thumb_url) ? $post->image_thumb_url : 'http://placehold.it/200x150&text=No+Image' }}" alt="">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                              <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{!! Form::file('image') !!}</span>
                              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                          </div>

                        @error('image')
                        <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                         @enderror
                    </div>
                    </div>
                </div>
             </div>
          </div>
          {!! Form::close() !!}
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@include('backend.blog.script')
