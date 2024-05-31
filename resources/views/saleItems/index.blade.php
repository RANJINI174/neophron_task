@extends('layout.index')
@section('content')
<body>

                 <div>
                 <div class="container mt-3 ">

                 <a href="{{ url('/saleItems/create') }}"><button type='submit'class='btn btn-primary'>Add New</button></a>


             <h2>Sale Items details</h2>
              {{-- <p>Here the details of the Sale Items</p> --}}
              <table class="table table-hover ">
                <thead>
                  <tr>
                  <th>ID</th>
                    <th>Invoice Number</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>unit_price</th>
                    <th>tax_name</th>
                    <th>total_price</th>
                    <th>Operations</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($SaleItems as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>
                                                         @foreach ($sales as $sale)
                                                    @if ($sale->id == $item->sale_id)
                                                 {{ $sale->invoice_no }}
                                                 @endif
                                                 @endforeach
                                                </td>
                                                    <td> @foreach ($Sports as $sport)
                                                    @if ($sport->id == $item->item_id)
                                                 {{ $sport->name }}
                                                 @endif
                                                 @endforeach </td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ $item->unit_price }}</td>
                           {{-- tax_name --}}
                                                    <td>
                                                        @foreach ($TaxDetails as $taxdetails)
                                                   @if ($taxdetails->id == $item->tax_id)
                                                {{ $taxdetails->tax_name }}
                                                @endif
                                                @endforeach
                                               </td>

                                                     {{-- <td>{{ $item->taxDetails->tax_name}}</td> --}}
                                                    {{-- <td>{{ $item->taxDetails->tax_name ?? 'N/A' }}</td> --}}
                                                    <td>{{ $item->total_price }}</td>




                                                    <td>

                                                        <a href="{{ url('/saleItems/' . $item->id . '/edit') }}" title="Edit Item"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                                        <form method="POST" action="{{ url('/saleItems' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Item" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                 @endforeach
                                            </tbody>



             </div>
             </div>
                 </div>



             </body>

             @endsection
