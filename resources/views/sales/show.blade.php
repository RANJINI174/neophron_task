@extends('layout.index')
@section('content')


<div class="card">
  <div class="card-header">View Page</div>
  <div class="card-body">


    @if($Sales)
              <h5 class="card-title">Customer Name : @foreach($Customers as $customer)
                    @if ($customer->id == $Sales->customer_id)
                        {{ $customer->customer_name }}
                    @endif
                @endforeach</h5>

              <p class="card-text">Invoice Number: {{ $Sales->invoice_no }}</p>
              <p class="card-text">Customer Id : {{ $Sales->customer_id }}</p>
              <p class="card-text">Total price : {{ $Sales->total_price }} </p>
              @else
              <p>Store not found.</p>
          @endif

  </div>
</div>

<br>

<table class="table table-hover ">
    <thead>
      <tr>
      <th>ID</th>
        {{-- <th>Invoice Number</th> --}}
        <th>Product Name</th>
        <th>Quantity</th>
        <th>unit_price</th>
        <th>total_price</th>

      </tr>
    </thead>
    <tbody>
    @foreach($SaleItems as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                             @foreach ($Sports as $sport)
                                        @if ($sport->id == $item->item_id)
                                     {{ $sport->name }}
                                     @endif
                                     @endforeach
                                    </td>



                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->unit_price }}</td>
                                        <td>{{ $item->total_price }}</td>

                                    </tr>
                               @endforeach
                                </tbody>


</table>



 {{-- </body> --}}

 @endsection
