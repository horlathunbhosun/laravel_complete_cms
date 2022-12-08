<table class="table table-bordered">
    <thead>
        <tr>
            <td width="80">Action</td>
            <td>Title</td>
            <td>Cover Image</td>
            <td width="120">Author</td>
            <td width="150">Category</td>
            <td width="170">Date</td>
        </tr>
        <tbody>
            @php
                $request = request();
            @endphp
          @foreach ($books as $book)


            <tr onclick="viewBook({{$book->id}})">
                <td>
                    {{-- {!! Form::open(['method' => 'DELETE' , 'action'=>['BookController@delete', $book->id]]) !!} --}}
                    {{-- @if (check_user_permissions($request, "Blog@edit", $book->id)) --}}
                        {{-- <a href="{{ route('blog.edit', $book->id)}}" class="btn btn-xs btn-default">
                            <i class="fa fa-edit"></i>
                        </a> --}}
                    {{-- @else --}}
                        <a href="/book/{{$book->id}}" class="btn btn-xs btn-default">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form method="POST" action="/book/{{$book->id}}">
                            @csrf
                        <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-xs btn-danger di">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        

                    {{-- @endif --}}

                   {{-- @if (check_user_permissions($request, "Blog@destroy", $book->id)) --}}
                        {{-- <button type="submit" class="btn btn-xs btn-danger">
                        <i class="fa fa-trash"></i>
                        </button> --}}
                   {{-- @else --}}
                        {{-- <button type="button" onchange="return false" class="btn btn-xs btn-danger disabled">
                        <i class="fa fa-trash"></i>
                        </button> --}}
                   {{-- @endif --}}

                    {{-- {!! Form::close() !!} --}}
                </td>
                <td>{{$book->title}}</td>
                <td> 
                    <div class="product-img">
                        <img class="img-responsive" src="{{$book->image ? asset('files') .'/'. $book->image : asset('images/no-image.png')}}" alt="Product Image">
                    </div>
                </td>
                <td> {{$book->author->name}} </td>
                <td>{{$book->category->title}}</td>
                <td>
                    {{-- <abbr title="{{$book->dateFormatted(true)}}">{{ $book->dateFormatted()}}</abbr> --}}
                    {{$book->created_at->diffForHumans()}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </thead>
</table>
