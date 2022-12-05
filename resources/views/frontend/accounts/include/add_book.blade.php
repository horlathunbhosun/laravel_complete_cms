@extends('frontend.layouts.app')


@section('title', 'Add Book')



@section('content')

    <!-- breadcrumbs-area-start -->
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#" class="active">my-account</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->
    <!-- entry-header-area-start -->
    
    <!-- entry-header-area-end -->
                <div class="row justify-content-center">
                    <div class="myaccount-content">
                        <h5>Account Details</h5>
                        <div class="account-details-form">
                            <form action="{{route('add.book')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single-input-item">
                                            <label for="first-name" class="required">Title</label>
                                            <input type="text" name="title" value="" placeholder="Title" />
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <label for="display-name" class="required">Slug</label>
                                    <input type="text" name="slug" value="" placeholder="Slug" />
                                </div>

                                <div class="single-input-item">
                                    <label for="display-name" class="required">Abstract</label>
                                    <input type="text" name="abstract" value="" placeholder="Abstract" />
                                </div>

                                <div class="single-input-item">
                                    <label for="display-name" class="required">Image</label>
                                    <input type="file" name="image" value="" />
                                </div>

                                <div class="single-input-item">
                                    <label for="display-name" class="required">Category</label>
                                    {{-- <input type="file" name="image" value="" /> --}}
                                    <select name="category" class="form-select">
                                        @forelse($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                        @empty
                                        <option value="">No categories yet</option>
                                        @endforelse
                                      </select>
                                </div>

                                <div class="single-input-item">
                                    <button type="submit" class="btn btn-sqr">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                 </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->

@endsection
