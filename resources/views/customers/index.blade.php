@extends('customers.layout')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>customers App</h2>
                          </div>
                        <div class="card-body">
                          <a href="{{ url('/customers/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                            <div class="dropdown float-end">
                                <a class="btn btn-secondary dropdown-toggle" href="bootstrap.min.css" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  groups
                                </a>



                                <ul class="dropdown-menu">
                                <tbody>

                                    @foreach ($groups as $item)
                                    <li><a class="dropdown-item" href="{{url('groups/' . $item->id .'/store') }}">
                                    <p> {{ $item->groups }}</p>
                                    @endforeach
                                  </a>
                                  <a class="dropdown-item" href="{{ url('groups') }}">add groups</a></li>
                                </ul>
                              </div>


                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>s.no</th>
                                        <th>name</th>
                                        {{-- <th>groups_id</th> --}}
                                        <th>mobile_no</th>
                                        <th>email</th>
                                        <th>gst_no</th>
                                        <th>billing_address</th>
                                        <th>shipping_address</th>
                                        <th>status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                @foreach($customers as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        {{-- <td>{{ $item->groups_id}}</td> --}}
                                        <td>{{ $item->mobile_no}}</td>
                                        <td>{{ $item->email}}</td>
                                        <td>{{ $item->gst_no }}</td>
                                        <td>{{ $item->billing_address }}</td>
                                        <td>{{ $item->shipping_address }}</td>
                                        <td>{{ $item->status }}</td>
                                        {{-- <td>{{ $item->groups->groups }}</td> --}}

                                        <td>
                                            <a href="{{ url('/customers/' . $item->id) }}" title="View customers"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/customers/' . $item->id . '/edit') }}" title="Edit customers"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/customers' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete customers" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
