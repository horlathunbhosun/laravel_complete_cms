  <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td width="80">Action</td>
                                <td>Name</td>
                                <td>email</td>
                                <td>Role</td>

                            </tr>
                            <tbody>
                                @php
                                    $currentUser = auth()->user()
                                @endphp
                              @foreach ($users as $user)


                                <tr>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id)}}" class="btn btn-xs btn-default">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @if($user->id == config('cms.user.default_user_id')  )
                                            <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        @else
                                            <a  href="{{ route('backend.user.confirm', $user->id)}}" class="btn btn-xs btn-danger">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        @endif

                                    </td>   
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->roles->first()->display_name}}</td>
                                    {{-- <td> {{$user->posts->count()}} </td> --}}

                                </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
