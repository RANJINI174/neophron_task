@extends('customers.layout')
@section('content')

<div class="card">
  <div class="card-header">customers Page</div>
  <div class="card-body">

      <form action="{{ url('customers') }}" method="post">
        {!! csrf_field() !!}
        <label>customer_name</label></br>
        <input type="text" name="customer_name" id="customer_name" class="form-control"></br>
        <div class="form-group row ">
            <label for="groups_id" >groups_id</label>
                <div class="form-control ">
                     <select class="form-control " id="groups_id" name="groups_id" required focus>
                     @foreach ($groups as $item)
                         <option value="{{ $item->id }}"  selected>{{ $item->groupName }}</option>
                         @endforeach
                         <option value="Select categoy" disabled selected>Select Group</option>
                     </select>
                </div>
       </div>
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
