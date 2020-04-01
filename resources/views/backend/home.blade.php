@extends('layouts.backend.main')


@section('title', 'MyBlog | Dashboard')
    

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dasbhboard
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body ">
                    <h3>Welcome to MyBlog!</h3>
                    <p class="lead text-muted">Hallo {{ Auth::user()->name}}, Welcome to MyBlog</p>

                    <h4>Get started</h4>
                    <p><a href="{{ route('blog.create')}}" class="btn btn-primary">Write your first blog post</a> </p>
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
