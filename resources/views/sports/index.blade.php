@extends('layout.index')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Sports App</h2>
                          </div>
                        <div class="card-body">
                          <a href="{{ url('/sports/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                            <div class="dropdown float-end">
                                <a class="btn btn-secondary dropdown-toggle" href="bootstrap.min.css" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  categories
                                </a>



                                <ul class="dropdown-menu">
                                <tbody>

                                    @foreach ($categories as $item)
                                    <li>
                                        <a class="dropdown-item" href="{{url('categories/' . $item->id .'/sports') }}">
                                            {{-- <a class="dropdown-item" href="{{ route('categories.show', $item->id) }}"> --}}
                                        <p> {{ $item->categories }}</p>
                                    @endforeach
                                  </a></li>
                                 <li> <a class="dropdown-item" href="{{ url('categories') }}">add categries</a></li>
                                </ul>
                              </div>


                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>s.no</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Categories</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                @foreach($sports as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->quantity }}</td>
                                         {{-- <td>{{ $item->categories->categories }}</td>  --}}
                                        <td>
                                         @foreach($categories as $cat)
                                         @if ($cat->id == $item->categories_id)
                                          {{ $cat->categories }}

                                        @endif
                                    @endforeach

                                      </td>
                                        <td>
                                            <a href="{{ url('/sports/' . $item->id) }}" title="View Sports"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/sports/' . $item->id . '/edit') }}" title="Edit Sports"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/sports' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Sports" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
