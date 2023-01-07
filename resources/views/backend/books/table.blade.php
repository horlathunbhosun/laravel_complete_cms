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


            <tr>
                <td>
                        <a href="/book/{{$book->id}}" class="btn btn-xs btn-default">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="/view-book/{{$book->id}}" class="btn btn-xs btn-default">
                            <i class="fa fa-eye"></i>
                        </a>
                        <form method="POST" action="/book/{{$book->id}}">
                            @csrf
                        <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-xs btn-danger di">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                </td>
                <td>{{$book->title}}</td>
                <td> 
                    <div class="product-img">
                        <img width="200px" height="100px" src="{{$book->image ? asset('files') .'/'. $book->image : asset('images/no-image.png')}}" alt="Product Image">
                    </div>
                </td>
                <td> {{$book->author->name}} </td>
                <td>{{$book->category->title}}</td>
                <td>
                    {{$book->created_at->diffForHumans()}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </thead>
</table>
