@extends('frontend.layouts.app')


@section('title', 'Book-Details')



@section('content')

<!-- blog-main-area-start -->
<div class="blog-main-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1 mx-auto">
                <div class="blog-main-wrapper">
                    <div class="author-destils mb-30">
                        <div class="author-left">
                            {{-- <div class="author-img">
                                <a href="#"><img src="img/author/1.jpg" alt="man" /></a>
                            </div> --}}
                            <div class="author-description">
                                <p>Posted by:
                                    <a href="#"><span>{{$book->author->name}}</span></a>
                                </p>
                                <span>{{$book->published_at}}</span>
                            </div>
                        </div>
                        <div class="author-right">
                        </div>
                    </div>
                    <div class="blog-img mb-30">
                        <img src="{{($book->image) ? asset('files') .'/'.$book->image : asset('images/no-image.png') }}" alt="blog" />
                    </div>
                    <div class="single-blog-content">
                        <div class="single-blog-title">
                            <h3>{{$book->title}}</h3>
                        </div>
                        <div class="blog-single-content">
                            <p>{!! $book->body !!}</p>
                            @forelse($book->chapter as $chapter)
                                <blockquote class="blockstyle">
                                    @if(auth()->user())
                                        <a href="/frontend/book/{{$book->id}}/chapter/{{$chapter->id}}">Chapter: {{$chapter->chapter_number}}</a>
                                    @else
                                        <a href="/frontend/book/{{$book->id}}/chapter/{{$chapter->id}}" onclick="return false;">Chapter: {{$chapter->chapter_number}}</a>
                                    @endif
                                </blockquote>
                            @empty
                            <blockquote class="blockstyle">No Chapters Yet</blockquote>
                            @endforelse
                            {{-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim. laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim.</p> --}}
                            {{-- <p>dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim. laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim.</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog-main-area-end -->
@endsection