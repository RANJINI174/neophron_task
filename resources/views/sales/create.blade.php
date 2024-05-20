@extends('sports.layout')
@section('content')

<div class="card">
  <div class="card-header">sales Page</div>
  <div class="card-body">

      <form action="{{ url('sales') }}" method="post">
        {!! csrf_field() !!}
         <label>customer_name</label></br>
         <input type="text" name="customer_name" id="customer_name" class="form-control"></br> 

         <div class="form-group">

            <label for="customer_id">Category</label>
         <select name="customer_id" id="customer_id" class="form-control">

                 @foreach($customers as $customer)
                     <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                 @endforeach
                 <option value="Select categoy" disabled selected>Select Customer Name</option>
             </select>
         </div>
         {{-- <label>Invoice Number</label></br> --}}
         {{-- <input type="text" name="invoice_no" id="invoice_no" class="form-control"></br> --}}
        <label>total_price</label></br>
        <input type="text" name="total_price" id="total_price" class="form-control"></br>



        <input type="submit" value="Save" class="btn btn-success"></br>



    </form>

  </div>
</div>

@stop
