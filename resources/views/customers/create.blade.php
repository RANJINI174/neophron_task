@extends('customers.layout')
@section('content')

<div class="card">
  <div class="card-header">customers Page</div>
  <div class="card-body">

      <form action="{{ url('customers') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>mobile_no</label></br>
        <input type="text" name="mobile_no" id="mobile_no" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="Email" class="form-control"></br>
        <label>GST_No</label></br>
        <input type="text" name="gst_no" id="gst_no" class="form-control"></br>
        <label>Billing address</label></br>
        <input type="text" name="billing_address" id="Billing address" class="form-control"></br>
        <label>Shipping address</label></br>
        <input type="text" name="shipping_address" id="Shipping address" class="form-control"></br>
        {{-- <label>status</label></br> --}}
       {{-- / <input type="text" name="status" id="status" class="form-control"></br> --}}

        <label for="add">Status:</label><br>
        <select name="status"class="form-control">
      <option value="1" {{ $status ? 'selected' : '' }}>Active</option>
      <option value="0" {{ $status ? '' : 'selected' }}>Inactive</option>
  </select>
      </div>

        <input type="submit" value="Save" class="btn btn-success"></br>



    </form>

  </div>
</div>

@stop
