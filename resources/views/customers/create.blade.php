@extends('customers.layout')
@section('content')

<div class="card">
  <div class="card-header">customers Page</div>
  <div class="card-body">

      <form action="{{ url('customers') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Group</label></br>
        <input type="text" name="Group" id="Group" class="form-control"></br>
        <label>Mobile_No</label></br>
        <input type="text" name="Mobile_No" id="Mobile_No" class="form-control"></br>
        <label>Email id</label></br>
        <input type="text" name="Email id" id="Email id" class="form-control"></br>
        <label>GST No</label></br>
        <input type="text" name="GST No" id="GST No" class="form-control"></br>
        <label>Billing Address</label></br>
        <input type="text" name="Billing Address" id="Billing Address" class="form-control"></br>
        <label>Shipping Address</label></br>
        <input type="text" name="Shipping Address" id="Shipping Address" class="form-control"></br>
        <label>Status</label></br>
        <input type="text" name="Status" id="Status" class="form-control"></br>

        <div class="form-group">

            <label for="groups_id">Category</label>
            <select name="groups_id" id="groups_id" class="form-control">

                @foreach($groups as $item)
                    <option value="{{ $item->id }}">{{ $item->groups }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Save" class="btn btn-success"></br>



    </form>

  </div>
</div>

@stop
