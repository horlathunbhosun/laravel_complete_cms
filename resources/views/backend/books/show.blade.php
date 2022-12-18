@extends('layouts.backend.main')


@section('title', 'MyBooks | Edit Book')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Book Details
        {{-- <small>it all starts here</small> --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('view.books')}}">Books</a></li>
        <li class="active">Book details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
            <div class="pull-right">
                <a href="/book/{{$book->id}}/add-chapter" class="btn btn-success"> <i class="fa fa-plus"></i> Add Chapter</a>
            </div>
            <div class="text-center">
                <img width="210" height="280" src="{{($book->image) ? asset('files') .'/'.$book->image : asset('images/no-image.png') }}" alt="Book Image">
            <h3>{{$book->title}}</h3>
            </div>

          {{-- <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div> --}}
        </div>
        <div class="box-body">
          <h4>Abstract:</h4>
          <p>{{$book->body}}</p>
        </div>
        <!-- /.box-body -->
        @forelse($book->chapter as $chapter)
        <div class="box-footer">
            <div class="pull-right">
                <a href="/view-chapter/{{$chapter->id}}" class="btn btn-xs btn-default">
                    <i class="fa fa-edit"></i>
                </a>
                <form method="POST" action="/book/{{$book->id}}/chapter/{{$chapter->id}}">
                    @csrf
                <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-xs btn-danger di">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </div>
          <h4>Chapter: {{$chapter->chapter_number}}</h4>
          <p>{{$chapter->chapter_title}}</p>
        </div>
        @empty
        <div class="box-footer">
            No Chapters yet
          </div>
        @endforelse
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection

@include('backend.blog.script')
