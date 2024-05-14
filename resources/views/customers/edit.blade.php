@extends('customers.layout')
@section('content')

<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">

      <form action="{{ url('customers/' .$customers->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$customers->id}}" id="id" />
        <label>name</label></br>
        <input type="text" name="name" id="name" value="{{$customers->name}}" class="form-control"></br>
        {{-- <label>status_id</label></br> --}}
        {{-- <input type="text" name="status_id" id="status_id" value="{{$customers->status_id}}" class="form-control"></br> --}}
        <label>mobile_no</label></br>
        <input type="text" name="mobile_no" id="Mobile_no" value="{{$customers->mobile_no}}" class="form-control"></br>
        <label>email</label></br>
        <input type="text" name="email" id="Email id" value="{{$customers->email}}" class="form-control"></br>
        <label>gst_no</label></br>
        <input type="text" name="gst_no" id="GST_No" value="{{$customers->gst_no}}" class="form-control"></br>
        <label>billing_address</label></br>
        <input type="text" name="billing_address" id="Billing address" value="{{$customers->billing_address}}" class="form-control"></br>
        <label>shipping_address</label></br>
        <input type="text" name="shipping_address" id="Shipping address" value="{{$customers->shipping_address}}" class="form-control"></br>
         {{-- <label>status</label></br> --}}
         {{-- <input type="text" name="status" id="status" class="form-control"></br> --}}
         <div class="form-group row">
            <label for="role" >Status</label>
                <div class="form-control ">

                <select name="status"class="form-control">
           <option value="1" {{ $status ? 'selected' : '' }}>Active</option>
           <option value="0" {{ $status ? '' : 'selected' }}>Inactive</option>
       </select>




          </div>
        </div>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
