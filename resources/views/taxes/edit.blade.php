@extends('layout.index')
@section('content')

<div class="card">
  <div class="card-header">Update the Product details</div>
  <div class="card-body">

      <form action="{{ url('tax/' .$tax_details->id) }}" method="post">
        @csrf
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$tax_details->id}}" id="id" />
        <label>Tax Name</label></br>
        <input type="text" name="tax_name" id="tax_name" value="{{$tax_details->tax_name}}" class="form-control"></br>
        <label>price</label></br>
        <input type="number" name="tax_percentage" id="tax_percentage" value="{{$tax_details->tax_percentage}}" class="form-control"></br>



       <br> <input type="submit" value="Update" class="btn btn-success"></br>

    </form>
  </div>
</div>

@stop
