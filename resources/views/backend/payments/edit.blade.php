@extends('layouts.backend.main')


@section('title', 'JustEroticHub | Edit Payment Plan')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog
                <small>Edit PaymentPlan</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('blog.index')}}">Blog</a></li>
                <li class="active">Edit PaymentPlan</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($category, ['method'=>'PUT', 'action'=>['Backend\CategoriesController@update', $category->id], 'id'=>'cate-form' ]) !!}
                <div class="col-md-4">
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


                            <div class="box-footer clearfix">
                                {{--  <div class="pull-left">

                                </div>  --}}
                                <div class="pull-left">
                                    {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                                    <a href="{{ url('backend/payment/plans')}}" class="btn btn-default">Cancel</a>

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

@include('backend.blog.script')
