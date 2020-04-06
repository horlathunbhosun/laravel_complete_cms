@extends('layouts.backend.main')


@section('title', 'MyBlog | Blog Index')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Display all Blog Post</small>
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
                <div class="box-header">
                    <div class="pull-left">
                        <a href="{{ route('blog.create')}}" class="btn btn-success"> Add New</a>
                    </div>
                </div>

              <!-- /.box-header -->

              <div class="box-body ">
                @if(! $posts->count())
                    <div class="alert alert-danger">
                        <strong>No record found</strong>
                    </div>
                 @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td width="80">Action</td>
                                <td>Title</td>
                                <td width="120">Author</td>
                                <td width="150">Category</td>
                                <td width="170">Date</td>
                            </tr>
                            <tbody>
                              @foreach ($posts as $post)


                                <tr>
                                    <td>
                                        <a href="{{ route('blog.edit', $post->id)}}" class="btn btn-xs btn-default">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('blog.destroy', $post->id)}}" class="btn btn-xs btn-danger">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                    <td>{{$post->title}}</td>
                                    <td> {{$post->author->name}} </td>
                                    <td>{{$post->category->title}}</td>
                                    <td>
                                        <abbr title="{{$post->dateFormatted(true)}}">{{ $post->dateFormatted()}}</abbr>
                                        {!! $post-> publicationLabel() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                    @endif
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <div class="pull-left">


                  <ul class="pagination no-margin">
                     {!! $posts->render()!!}
                  </ul>
                </div>
                <div class="pull-right">
                    <small>{{ $postCount}} {{ str_plural('item', $postCount)}}</small>
                </div>
              </div>
            </div>
            <!-- /.box -->
          </div>
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('script')

  <script type="text/javascript">
      $('ul.pagination').addClass('no-margin pagination-sm');

      $(#title).on('blur', function(){
        var theTitle = this.value.toLowerCase().trim(),
            slugInput = $('#slug'),
            theSlug = theTitle.replace(/&/g, '-and-')
                              .replace(/[^a-z0-9-]+/g, '-')
                              .replace(/\-\-+/g, '-')
                              .replace(/^-+|-+$/g, '');

            slugInput.val(theSlug);
      });
  </script>

@endsection
