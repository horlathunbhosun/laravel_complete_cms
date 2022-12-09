@extends('layouts.backend.main')


@section('title', 'MyBooks | Add New Book')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Books
        <small>Add New Book</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('create.book')}}">Books</a></li>
        <li class="active">Add New Book</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          {!! Form::open( ['method'=>'POST', 'action'=>'BookController@addBook','files'=>true, 'id'=>'post-form' ]) !!}
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
                            <label for="text">Title</label>
                            <input class="ckeditor form-control" placeholder="Enter The Title" name="title" rows="10" cols="80">

                            @error('title')
                                <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('body') is-invalid @enderror ">
                            <label for="text">Body</label>
                            <textarea class="ckeditor form-control" placeholder="Enter The Body" name="body" rows="10" cols="80">
                            </textarea>
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
                      {{-- <div class="pull-left">
                          <a id="draft-btn" class="btn btn-adn"> Save Draft</a>
                      </div> --}}
                      <div class="text-center">
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
                              <img src="http://placehold.it/200x150&text=No+Image" alt="">
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

  <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection

@include('backend.blog.script')



