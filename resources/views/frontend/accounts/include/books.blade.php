<div class="myaccount-content">
    <h5>Books</h5>
    <a href="/user/add-book" style="float: right;" class="btn btn-sqr">Add book</a>
    <!-- Single book added to the library section ends -->
    <div class="row">
        <div class="col-md-3">
            <div class="product-wrapper">
                @forelse($books as $book)
                        <div class="product-img">
                            <a href="#">
                                
                                <img src="{{$book->image ? asset('files') .'/'. $book->image : asset('img/product/1.jpg')}}" alt="book" class="primary" />
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
                            <h4><a href="#">{{$book->author->name}}</a></h4>
                            <h5><a href="#">{{$book->title}}</a></h5>
                            @empty
                        {{-- <div class="welcome"> --}}
                            <p>Hello, <strong>{{\Illuminate\Support\Facades\Auth::user()->name}}</strong></p>
                        {{-- </div> --}}
                        <p class="mb-0">No book yet!</p>
                        @endforelse
                        {{-- <div class="product-price"> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Single book added to  the library section ends -->
</div>
