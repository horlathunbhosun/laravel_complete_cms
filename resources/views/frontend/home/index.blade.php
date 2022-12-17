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
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="bestseller-active owl-carousel">
                            <div class="single-bestseller mb-25">
                                @forelse($newArrivalBooks as $book)
                                <div class="bestseller-img">
                                    <a href="/view-book/{{$book->id}}"><img src="{{($book->image) ? asset('files') .'/'.$book->image : asset('images/no-image.png') }}" alt="book" /></a>
                                </div>
                                <div class="bestseller-text text-center">
                                    <h3> <a href="/view-book/{{$book->id}}">{{$book->title}}</a></h3>
                                    <h4> <i>{{$book->author->name}}</i></h4>
                                </div>
                            </div>
                            @empty
                            <h4>No Books Yet</h4>
                            @endforelse
                            {{-- <div class="single-bestseller">
                                <div class="bestseller-img">
                                    <a href="#"><img src="/web/img/product/14.jpg" alt="book" /></a>
                                </div>
                                <div class="bestseller-text text-center">
                                    <h3> <a href="#">Impulse Duffle</a></h3>
                                </div>
                            </div> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">

                </div>
            </div>
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
                <div class="tab-pane fade show active">
                    <div class="tab-active owl-carousel">
                        <!-- single-product-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <div class="product-img">
                                    @forelse($completedBooks as $book)
                                    <a href="/view-book/{{$book->id}}">
                                        <img src="{{($book->image) ? asset('files') .'/'.$book->image : asset('images/no-image.png') }}" alt="book" class="primary" />
                                    </a>
                                    {{-- <div class="quick-view">
                                        <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div> --}}
                                    {{-- <div class="product-flag">
                                    </div> --}}
                                </div>
                                <div class="product-details text-center">
                                    <div class="product-rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4><a href="/view-book/{{$book->id}}">{{$book->title}}</a></h4>
                                    <h5><i>{{$book->author->name}}</a></i></h5>
                                    <div class="product-price">
                                    </div>
                                </div>
                                {{-- <div class="product-link">
                                    <div class="product-button">
                                        <a href="#" title="Add to cart pt-5">
                                            Add to library
                                        </a>
                                    </div> --}}
                                    {{-- <div class="add-to-link">
                                        <ul>
                                            <li>
                                                <a href="#" title="Details">
                                                <i class="fa fa-external-link"></i>
                                            </a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                </div>
                                @empty
                                <h4><a href="#">No Books Yet</a></h4>
                                @endforelse
                            </div>
                        <!-- single-product-end -->
                    </div>
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
                            <div class="single-most-product bd mb-18">
                                @forelse($featuredBooks as $book)
                                <div class="most-product-img">
                                    <a href="/view-book/{{$book->id}}"><img src="{{($book->image) ? asset('files') .'/'.$book->image : asset('images/no-image.png') }}" alt="book" /></a>
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
                                    <h4><a href="/view-book/{{$book->id}}">{{$book->title}}</a></h4>
                                    <h5><i>{{$book->author->name}}</i></h5>

                                    {{-- <div class="product-price">
                                        <ul>
                                            <li>{{$book->author->name}}</li>
                                            <li class="old-price">$33.00</li>
                                        </ul>
                                    </div> --}}
                                    @empty
                                <h5><i>No Books yet</i></h5>
                                @endforelse
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="section-title-2 mb-30">
                        <h3>New Arrivals </h3>
                    </div>
                    <div class="product-active-2 owl-carousel">
                        <div class="product-total-2">
                            <div class="single-most-product bd mb-18">
                                <div class="most-product-img">
                                    @forelse($newArrivalBooks as $book)
                                    <a href="/view-book/{{$book->id}}"><img src="{{($book->image) ? asset('files') .'/'.$book->image : asset('images/no-image.png') }}" alt="book" /></a>
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
                                    <h4><a href="/view-book/{{$book->id}}">{{$book->title}}</a></h4>
                                    <h5><i>{{$book->author->name}}</i></h5>

                                    {{-- <div class="product-price">
                                        <ul>
                                            <li>$30.00</li>
                                            <li class="old-price">$33.00</li>
                                        </ul>
                                    </div> --}}
                                    @empty
                                <h5><i>No Books yet</i></h5>
                                @endforelse
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="section-title-2 mb-30">
                        <h3>Completed Books</h3>
                    </div>
                    <div class="product-active-2 owl-carousel">
                        <div class="product-total-2">
                            <div class="single-most-product bd mb-18">
                                <div class="most-product-img">
                                    @forelse($completedBooks as $book)
                                    <a href="/view-book/{{$book->id}}"><img src="{{($book->image) ? asset('files') .'/'.$book->image : asset('images/no-image.png') }}" alt="book" /></a>
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
                                    <h4><a href="/view-book/{{$book->id}}">{{$book->title}}</a></h4>
                                    <h5><i>{{$book->author->name}}</i></h5>

                                    {{-- <div class="product-price">
                                        <ul>
                                            <li>$30.00</li>
                                            <li class="old-price">$33.00</li>
                                        </ul>
                                    </div> --}}
                                    @empty
                                <h5><i>No Books yet</i></h5>
                                @endforelse
                                </div>
                                
                            </div>
                            
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
