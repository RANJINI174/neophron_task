@extends('layout.index')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">

                        <h2>groups</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/groups/create') }}" class="btn btn-success btn-sm" title="Add New groups">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>s.no</th>

                                        <th>groupName</th>
                                        <th>groupCode</th>
                                        {{-- <th>Group Members</th> --}}
                                        <th>No. of Items</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                {{-- @foreach($productCount as $groups) --}}
                                  @foreach($Groups as $item => $Groups)
                                    <tr>
                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                         {{-- <td>{{ $groups->groupsName  }}</td> --}}
                                         {{-- <td>{{ $groups->groupCode  }}</td> --}}
                                         {{-- <td>{{ $group->product_count }}</td> --}}
                                          <td>{{ $item + 1 }}</td>
                                          <td>{{ $Groups->groupName }}</td>
                                          <td>{{ $Groups->groupCode }}</td>
                                           {{-- <td>{{ $groups->groups_count }}</td> --}}
                                          <td>{{ count($Groups->customer) }}</td>
                                        <td>
                                             <a href="{{ url('/groups/' . $Groups->id) }}" title="View groups "><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/groups/' . $Groups->id . '/edit') }}" title="Edit groups "><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/groups' . '/' . $Groups->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete groups" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
    @stop

