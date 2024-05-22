@extends('layout.index')
@section('content')

<div class="card">
  <div class="card-header">Update the Details</div>
  <div class="card-body">

      <form action="{{ url('sales/' .$Sales->id) }}" method="post">
        @csrf
        @method("PATCH")

        <div class="form-group row">
     <label for="role" >Customer Name</label>
         <div class="form-control ">
              <select class="form-control" id="customer_id" name="customer_id" required focus>
              @foreach ($Customers as $customer)
                  <option value="{{ $customer->id }}"   @if ($Sales->customer_id == $customer->id ) selected @endif>{{ $customer->customer_name }}</option>
                  @endforeach

              </select>
         </div>
              </div>
        <label>Total price</label></br>
        <input type="number" name="total_price" id="quatotal_pricentity" value="{{$Sales->total_price}}" class="form-control"></br>


       <br> <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>
@stop
