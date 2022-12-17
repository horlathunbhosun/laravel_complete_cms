<!-- featured-area-start -->
<div class="new-book-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title section-title-res text-center mb-30">
                    <h2>Featured</h2>
                </div>
            </div>
        </div>
        <div class="tab-active owl-carousel">
            <div class="tab-total">
                <!-- single-product-start -->
                <div class="product-wrapper">
                    <div class="product-img">
                        @forelse($featuredBooks as $book)
                        <a href="#">
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
                        <h4><a href="#">{{$book->title}}</a></h4>
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
                    <h4><a href="#">No Featured Books Yet</a></h4>
                    @endforelse
                </div>
                <!-- single-product-end -->
            </div>
        </div>
    </div>
</div>
<!-- featured-area-start -->

<!-- banner-area-start -->
<div class="banner-area-5 mtb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-img-2">
                    <a href="#"><img src="/web/img/banner/5.jpg" alt="banner" /></a>
                    <div class="banner-text">
                        <h3>G. bosu Meyer Books & Spiritual Traveler Press</h3>
                        <h2>Sale up to 30% off</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner-area-end -->
