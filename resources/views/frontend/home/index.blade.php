@extends('frontend.layouts.app')


@section('title', 'Homepage')



@section('content')


@include('frontend.home.slider')

@include('frontend.home.featured')


<!-- bestseller-area-start -->
    <div class="bestseller-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title section-title-res text-center mb-30">
                        <h2>New Arrival</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($newArrivalBooks as $book)
                    <div class="single-bestseller mb-25 col-md-2">
                        <div class="bestseller-img">
                            <a href="/frontend/view-book/{{$book->id}}">
                                <img src="{{($book->image) ? asset('files') .'/'.$book->image : asset('images/no-image.png') }}" alt="book" class="primary" />
                            </a>
                        </div>
                        <div class="bestseller-text text-center">
                            <h4><a href="/frontend/view-book/{{$book->id}}">{{$book->title}}</a></h4>
                            {{-- <h5><i>Author: {{$book->author->name}}</a></i></h5> --}}
                        </div>
                    </div>
                                
                    @empty
                    <h4><a href="#">No Books Yet</a></h4>
                @endforelse
            </div>
    </div>
    <!-- bestseller-area-end -->
    <!-- product-area-start -->
    <div class="product-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title bt text-center pt-100 mb-50">
                        <h2>Our Completed Books</h2>
                    </div>
                </div>
            </div>
            <!-- tab-area-start -->
            <div class="row">
                @forelse($completedBooks as $book)
                    <div class="single-bestseller mb-25 col-md-2">
                        <div class="bestseller-img">
                            <a href="/frontend/view-book/{{$book->id}}">
                                <img src="{{($book->image) ? asset('files') .'/'.$book->image : asset('images/no-image.png') }}" alt="book" class="primary" />
                            </a>
                        </div>
                        <div class="bestseller-text text-center">
                            <h4><a href="/frontend/view-book/{{$book->id}}">{{$book->title}}</a></h4>
                            {{-- <h5><i>Author: {{$book->author->name}}</a></i></h5> --}}
                        </div>
                    </div>
                                
                    @empty
                    <h4><a href="#">No Books Yet</a></h4>
                @endforelse
            </div>
            <!-- tab-area-end -->
        </div>
    </div>
    <!-- product-area-end -->
    <!-- most-product-area-start -->
    <div class="most-product-area pb-100">
        <div class="container">
            <div class="row bt-3 pt-95">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="section-title-2 mb-30">
                        <h3>Featured Books</h3>
                    </div>
                    <div class="product-active-2 owl-carousel">
                        <div class="product-total-2">
                            @forelse($featuredBooks as $book)
                            <div class="single-most-product bd mb-18">
                                <div class="most-product-img">
                                    <a href="/frontend/view-book/{{$book->id}}">
                                        <img src="{{($book->image) ? asset('files') .'/'.$book->image : asset('images/no-image.png') }}" alt="book" />
                                    </a>
                                    {{-- <h4><a href="/frontend/view-book/{{$book->id}}">{{$book->title}}</a></h4> --}}
                                </div>
                                <div class="most-product-content">
                                    <div class="product-rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4><a href="/frontend/view-book/{{$book->id}}">{{$book->title}}</a></h4>
                                    {{-- <div class="product-price">
                                        <ul>
                                            <li>$30.00</li>
                                            <li class="old-price">$33.00</li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                            @empty
                                <h5><i>No Books yet</i></h5>
                            @endforelse 
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="section-title-2 mb-30">
                        <h3>New Arrivals </h3>
                    </div>
                    <div class="product-active-2 owl-carousel">
                        <div class="product-total-2">
                            @forelse($newArrivalBooks as $book)
                            <div class="single-most-product bd mb-18">
                                <div class="most-product-img">
                                    <a href="/frontend/view-book/{{$book->id}}">
                                        <img src="{{($book->image) ? asset('files') .'/'.$book->image : asset('images/no-image.png') }}" alt="book" />
                                    </a>
                                    {{-- <h4><a href="/frontend/view-book/{{$book->id}}">{{$book->title}}</a></h4> --}}
                                </div>
                                <div class="most-product-content">
                                    <div class="product-rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4><a href="/frontend/view-book/{{$book->id}}">{{$book->title}}</a></h4>
                                    {{-- <div class="product-price">
                                        <ul>
                                            <li>$30.00</li>
                                            <li class="old-price">$33.00</li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                            @empty
                                <h5><i>No Books yet</i></h5>
                            @endforelse 
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="section-title-2 mb-30">
                        <h3>Completed Books</h3>
                    </div>
                    <div class="product-active-2 owl-carousel">
                        <div class="product-total-2">
                            @forelse($completedBooks as $book)
                            <div class="single-most-product bd mb-18">
                                <div class="most-product-img">
                                    <a href="/frontend/view-book/{{$book->id}}">
                                        <img src="{{($book->image) ? asset('files') .'/'.$book->image : asset('images/no-image.png') }}" alt="book" />
                                    </a>
                                    {{-- <h4><a href="/frontend/view-book/{{$book->id}}">{{$book->title}}</a></h4> --}}
                                </div>
                                <div class="most-product-content">
                                    <div class="product-rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4><a href="/frontend/view-book/{{$book->id}}">{{$book->title}}</a></h4>
                                    {{-- <div class="product-price">
                                        <ul>
                                            <li>$30.00</li>
                                            <li class="old-price">$33.00</li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                            @empty
                                <h5><i>No Books yet</i></h5>
                            @endforelse 
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="block-newsletter">
                        <h2>Sign up for send newsletter</h2>
                        <p>You can be always up to date with our company new!</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your email address" />
                        </form>
                        <a href="#">Send Email</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- most-product-area-end -->
    <!-- social-group-area-start -->
    <div class="social-group-area ptb-60 bt">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 mx-auto col-12">
                    <div class="section-title-3">
                        <h3>Stay Connected</h3>
                    </div>
                    <div class="link-follow">
                        <ul>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- social-group-area-end -->
    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="modal-tab">
                                <div class="product-details-large tab-content">
                                    <div class="tab-pane active" id="image-1">
                                        <img src="/web/img/product/quickview-l4.jpg" alt="" />
                                    </div>
                                    <div class="tab-pane" id="image-2">
                                        <img src="/web/img/product/quickview-l2.jpg" alt="" />
                                    </div>
                                    <div class="tab-pane" id="image-3">
                                        <img src="/web/img/product/quickview-l3.jpg" alt="" />
                                    </div>
                                    <div class="tab-pane" id="image-4">
                                        <img src="/web/img/product/quickview-l5.jpg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="modal-pro-content">
                                <h3>Chaz Kangeroo Hoodie3</h3>
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.</p>
                                <br>
                                <form action="#">
                                    <button>Add to library</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->



@endsection
