@extends('layouts.backend.main')


@section('title', 'MyBlog | User Index')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Display all Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('users.index')}}">Users</a></li>
        <li class="active">All Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
                <div class="box-header clearfix">
                    <div class="pull-left">
                        <a href="{{ route('users.create')}}" class="btn btn-success"> <i class="fa fa-plus"></i> Add New</a>
                    </div>

                    <div class="pull-right" style="padding:7px 0px">

                    </div>
                </div>

              <!-- /.box-header -->

              <div class="box-body ">
                @if(! $users->count())
                    <div class="alert alert-danger">
                        <strong>No record found</strong>
                    </div>
                 @else


                        @include('backend.users.table')

                @endif
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <div class="pull-left">


                  <ul class="pagination no-margin">
                     {!! $users->appends( Request::query() )->render()!!}
                  </ul>
                </div>
                <div class="pull-right">
                    <small>{{ $userCount}} {{ str_plural('item', $userCount)}}</small>
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
