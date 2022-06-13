
                    <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td width="80">Action</td>
                        <td> Amount USD</td>
                        <td> Amount NGN</td>
                        <td> Coin Value</td>
                        <td width="120">Bonus</td>
                    </tr>
                    <tbody>
                    @foreach ($payment_plans as $plan)


                        <tr>
                            <td>
                                {!! Form::open(['method' => 'DELETE' , 'action'=>['Backend\PaymentPlanController@destroy', $plan->id]]) !!}
                                <a href="{{ route('plans.edit', $plan->id)}}" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button onclick="return confirm('Are You Sure?')" type="submit" class="btn btn-xs btn-danger">
                                    <i class="fa fa-times"></i>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        <td>{{$plan->amount_usd}}</td>
                        <td>{{$plan->amount_ngn}}</td>
                        <td>{{$plan->coin_value}}</td>
                        <td>{{$plan->bonus}}</td>
{{--                        <td> {{$category->posts->count()}} </td>--}}
                    </tr>
            @endforeach
    </tbody>
    </thead>
</table>
