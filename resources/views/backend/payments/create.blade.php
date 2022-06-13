@extends('layouts.backend.main')


@section('title', 'MyBlog | Add Payment Plan ')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Add New Payment Plan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('plans.index')}}">Blog</a></li>
        <li class="active">Add New Payment Plan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          {!! Form::open(['method'=>'POST', 'action'=>'Backend\PaymentPlanController@store','files'=>true, 'id'=>'user-form' ]) !!}
          <div class="col-md-8">
            <div class="box">
                {{-- <div class="box-header">
                    <div class="pull-left">
                        <p>The Form</p>
                    </div>
                </div> --}}
              <!-- /.box-header -->
                  <div class="box-body ">
                        <div class="form-group @error('amount_usd') is-invalid @enderror">
                            {!! Form::label('Amount Usd') !!}
                            {!! Form::text('amount_usd', null, ['class'=>'form-control ', 'placeholder'=>'Enter Amount In Usd']) !!}

                            @error('amount_usd')
                                <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('amount_ngn') is-invalid @enderror">
                            {!! Form::label('Amount Ngn') !!}
                            {!! Form::text('amount_ngn', null, ['class'=>'form-control ', 'placeholder'=>'Enter Amount In NGN']) !!}

                            @error('amount_ngn')
                                <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group @error('coin_value') is-invalid @enderror">
                            {!! Form::label('Coin Value') !!}
                            {!! Form::text('coin_value', null, ['class'=>'form-control ', 'placeholder'=>'Enter Coin Value']) !!}

                            @error('coin_value')
                                <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group @error('bonus') is-invalid @enderror">
                            {!! Form::label('Bonus') !!}
                            {!! Form::text('bonus', null, ['class'=>'form-control ', 'placeholder'=>'Enter Bonus ']) !!}

                            @error('bonus')
                                <span class="label label-danger" style="color:red;" role="alert" >{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="box-footer clearfix">

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




