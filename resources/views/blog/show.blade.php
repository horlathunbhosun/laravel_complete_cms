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
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="{{route('author', $posts->author->slug )}}"> {{ $posts->author->name}}</a></li>
                                    <li><i class="fa fa-clock-o"></i><time>{{ $posts->date}}</time></li>
                                    <li><i class="fa fa-tags"></i><a href="#"> Blog</a></li>
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
                            <img alt="Author 1" src="/img/author.jpg" class="media-object">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="{{route('author', $posts->author->slug )}}">{{ $posts->author->name}}</a></h4>
                            <div class="post-author-count">
                            <a href="#">
                                <i class="fa fa-clone"></i>
                                <?php  $postCount =   $posts->author->posts->count() ?>
                                {{ $postCount}} {{ str_plural('post', $postCount)}}
                            </a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad aut sunt cum, mollitia excepturi neque sint magnam minus aliquam, voluptatem, labore quis praesentium eum quae dolorum temporibus consequuntur! Non.</p>
                        </div>
                    </div>
                </article>

                <!-- comments here -->
            </div>

            @include('layouts.sidebar')
        </div>
    </div>

@endsection
