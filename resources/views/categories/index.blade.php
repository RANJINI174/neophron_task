@extends('layout.index')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">

                        <h2>categories</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/categories/create') }}" class="btn btn-success btn-sm" title="Add New categories">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>s.no</th>
                                        <th>categories</th>

                                        <th>No. of Items</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                {{-- <!--@foreach($categories as $item)--> --}}
                                @foreach($categories as $item => $categories)
                                    <tr>
                                      {{-- <!--  <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->categories  }}</td>
                                        <td>{{ $item->categories  }}</td>   --> --}}
                                        <td>{{ $item + 1 }}</td>
                                        <td>{{ $categories->categories }}</td>
                                        <td>{{ count($categories->sports) }}</td>
                                        <td>
                                            <a href="{{ url('/categories/' . $categories->id) }}" title="View categories "><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/categories/' . $categories->id . '/edit') }}" title="Edit categories "><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/categories' . '/' . $categories->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete categories" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
