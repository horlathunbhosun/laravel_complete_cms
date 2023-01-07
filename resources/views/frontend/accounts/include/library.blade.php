<div class="myaccount-content">
    <h5>Library</h5>
    <!-- Single book added to the library section ends -->
    <div class="row">
        @forelse($library as $book)
        <div class="col-md-3">
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="/frontend/view-book/{{$book->id}}">
                        <img src="{{($book->image) ? asset('files') .'/'.$book->image : asset('images/no-image.png') }}" alt="book" class="primary" />
                    </a>
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
                    <h4><a href="/frontend/view-book/{{$book->id}}">{{$book->title}}</a></h4>
                    <div class="product-price">
                    </div>
                </div>
            </div>
        </div>
        @empty
        <h4><a href="#">No Books Yet</a></h4>
        @endforelse
        </div>
        <div class="d-flex justify-content-center">
            {!! $library->links() !!}
        </div>
    <!-- Single book added to  the library section ends -->
</div>
