@extends('layout.index')
@section('content')


<div class="card">
  <div class="card-header">Sales Details</div>

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
        <th>Tax Name</th>
        <th>total_price</th>

      </tr>
    </thead>
    <tbody>
    @foreach($SaleItems as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                             @foreach ($sports as $sport)
                                        @if ($sport->id == $item->item_id)
                                     {{ $sport->name }}
                                     @endif
                                     @endforeach
                                    </td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->unit_price }}</td>
                                        <td>
                                            @foreach ($TaxDetails as $taxdetails)
                                       @if ($taxdetails->id == $item->tax_id)
                                    {{ $taxdetails->tax_name }}
                                    @endif
                                    @endforeach
                                   </td>

                                        <td>{{ $item->total_price }}</td>

                                    </tr>
                               @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="bg-secondary text-white">
                                        <td colspan="5" class="text-right"><strong>Total:</strong></td>
                                        <td>{{ $total_price_sum }}</td>
                                    </tr>

                                </tfoot>
    </table>
    <tr>
        <td colspan="4" class="text-right"><strong></strong></td>
        <td> <a href="{{ url('/admincart/'. $Sales->id) }}"><button type='submit'class='btn btn-primary'>Click to add</button></a></td>
      </tr>
    <a href="{{ url('/admincart/invoice/'. $Sales->id) }}"><button type='submit' target='_blank'class='btn btn-danger float-end mx-1'>View Invoice</button></a>
    <a href="{{ url('/admincart/invoice/'. $Sales->id.'/generate') }}"><button type='submit' class='btn btn-warning float-end mx-1'>Download Invoice</button></a>
 {{-- </body> --}}

 @endsection
 @section('styles')
 <style>
   @media print {
     body * {
       visibility: hidden;
     }
     .card, .card * {
       visibility: visible;
     }
     .card {
       position: absolute;
       left: 0;
       top: 0;
       width: 100%;
       margin: 0;
       padding: 0;
     }
     .card-header {
       text-align: center;
     }
     .card-header::before {
       content: url('path_to_your_logo.png'); /* Add your logo path here */
       display: block;
       margin-bottom: 10px;
     }
     .card-footer {
       display: none; /* Hide elements that are not needed in print */
     }
   }
 </style>
 @endsection

