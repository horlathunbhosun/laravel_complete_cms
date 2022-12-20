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
        
        <div class="row">
            @forelse($featuredBooks as $book)
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
            <h4><a href="#">No Featured Books Yet</a></h4>
            @endforelse          
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
