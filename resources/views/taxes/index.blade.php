@extends('layout.index')
@section('content')



<body>

    <div>
    <div class="container mt-3">






<h2>Tax details</h2>
 <br>
 <table class="table table-hover">
   <thead>

      <a href="{{ url('/tax/create') }}" class="btn btn-success btn-sm" title="Add New Student">
        <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
     <tr>
     <th>ID</th>
       <th>Tax Name</th>
       <th>Tax Percentage</th>

       <th>Operations</th>
     </tr>
   </thead>
   <tbody>
   @foreach($tax_details as $item)
                                   <tr>
                                       <td>{{ $loop->iteration }}</td>
                                       <td>{{ $item->tax_name }}</td>
                                       <td>{{ $item->tax_percentage }} %</td>


                                       <td>
                                           <!-- <a href="{{ url('/sports/'. $item->id) }}" title="View Item"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> -->
                                           <a href="{{ url('/tax/' . $item->id . '/edit') }}" title="Edit Item"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                           <form method="POST" action="{{ url('/tax' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                               {{ method_field('DELETE') }}
                                               {{ csrf_field() }}
                                               <button type="submit" class="btn btn-danger btn-sm" title="Delete Item" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                           </form>
                                       </td>
                                   </tr>
    @endforeach


                               </tbody>




</div>




</body>

@endsection
