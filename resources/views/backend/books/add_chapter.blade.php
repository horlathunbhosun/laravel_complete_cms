@extends('layouts.backend.main')


@section('title', 'MyBooks | Edit Book')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Chapter
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{ route('create.book')}}">Book</a></li>
        <li class="active">Chapters</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              {{-- <h3 class="box-title">CK Editor
                <small>Advanced and full of features</small>
              </h3>
            </div> --}}
            <!-- /.box-header -->
            <div class="box-body pad">
              <form method="POST" action="/book/{{$book->id}}/add_chapter" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="text">Chapter Number</label>
                    <input class="ckeditor form-control" name="chapter_number" placeholder="Enter Chapter Number" rows="10" cols="80">
                </div>
                <div class="form-group">
                    <label for="text">Chapter Title</label>
                    <input class="ckeditor form-control" placeholder="Enter Chapter Title" name="chapter_title" rows="10" cols="80">
                </div>
                <div class="form-group">
                    <label for="text">Chapter Body</label>
                    <textarea class="ckeditor form-control" placeholder="Enter Chapter Body" name="chapter_body" rows="10" cols="80">
                        
                    </textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Chapter</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col-->
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
