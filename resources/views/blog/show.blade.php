@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post-item post-detail">
                    @if ($posts->image_url)
                        <div class="post-item-image">
                                <img src="{{ $posts->image_url }}" alt="{{ $posts->title }}">
                            
                        </div>
                    @endif
                    <div class="post-item-body">
                        <div class="padding-10">
                            <h1>{{ $posts->title}}</h1>

                            <div class="post-meta no-border">
                                <?php $author = $posts->author ?>
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="{{ route('author', $author->slug )}}"> {{ $author->name}}</a></li>
                                    <li><i class="fa fa-clock-o"></i><time>{{ $posts->date}}</time></li>
                                    <li><i class="fa fa-folder"></i><a href="{{ route('category', $posts->category->slug)}}"> {{$posts->category->title}}</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul> 
                            </div>
                            <p>
                            {!!
                                
                                        $posts->body_html
                            !!}           
                            </p>
                        </div>
                    </div>
                </article>
                <article class="post-author padding-10">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                            <img alt="{{ $author->name}}" width="100" height="100" src="{{ $author->gravatar() }}" class="media-object">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="{{route('author', $author->slug )}}">{{ $author->name}}</a></h4>
                            <div class="post-author-count">
                          
                            </div>
                           {!! $author->bio_html !!}
                        </div>
                    </div>
                </article>

                <!-- comments here -->
            </div>

            @include('layouts.sidebar')
        </div>
    </div>

@endsection
