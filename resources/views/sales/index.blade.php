@extends('sports.layout')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>sales details</h2>
                          </div>


                            <div class="card-body">

                                <a href="{{ url('/sales/create') }}" class="btn btn-success btn-sm" title="Add New customers">
                                   <i class="fa fa-plus" aria-hidden="true"></i> click to add
                                   </a>
                                 <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>s.no</th>
                                        <th>Customer Name</th>
                                         <th>Invoice Number</th>
                                        <th>total price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                 @foreach($sales as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            @foreach($sales as $sales)
                                                @if ($sales->id == $item->customer_id)
                                                    {{ $sales->customer_name }}

                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $item->invoice_no}}</td>
                                        <td>{{ $item->total_price}}</td>

                                        {{-- <td>{{ $item->status }}</td> --}}
                                        {{-- <td>{{ $item->groups->groups }}</td> --}}

                                        <td>
                                            <a href="{{ url('/sales/' . $item->id) }}" title="View sales"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/sales/' . $item->id . '/edit') }}" title="Edit sales"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                             <form method="POST" action="{{ url('/sales' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete sales" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
