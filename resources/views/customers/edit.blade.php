@extends('customers.layout')
@section('content')

<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">

      <form action="{{ url('customers/' .$customers->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$customers->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$customers->name}}" class="form-control"></br>
        <label>Group</label></br>
        <input type="text" name="description" id="description" value="{{$customers->description}}" class="form-control"></br>
        <label>Mobile_no</label></br>
        <input type="text" name="Mobile_no" id="Mobile_no" value="{{$customers->Mobile_no}}" class="form-control"></br>
        <label>Email id</label></br>
        <input type="text" name="Email id" id="Email id" value="{{$customers->Email id}}" class="form-control"></br>
        <label>GST No</label></br>
        <input type="text" name="GST No" id="GST No" value="{{$customers->GST No}}" class="form-control"></br>
        <label>Billing address</label></br>
        <input type="text" name="Billing address" id="Billing address" value="{{$customers->Billing address}}" class="form-control"></br>
        <label>Shipping address</label></br>
        <input type="text" name="Shipping address" id="Shipping address" value="{{$customers->Shipping address}}" class="form-control"></br>
        <label>Status</label></br>
        <input type="text" name="Status" id="Status" value="{{$customers->Status}}" class="form-control"></br>
        <div class="form-group">

            <label for="groups">Category</label>
            <select name="groups_id" id="groups_id" class="form-control">

                @foreach($groups as $item)
                  {{-- <option value="{{ $item->id }}">{{ $item->groups }}</option> --}}
                  <option value="{{ $item->id }}" {{ $item->id == $customers->groups_id ? 'selected' : '' }}>
                    {{ $item->groups }}
                </option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
