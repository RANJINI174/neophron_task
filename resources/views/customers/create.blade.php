@extends('layout.index')
@section('content')

<div class="card">
  <div class="card-header">customers Page</div>
  <div class="card-body">

      <form action="{{ url('customers') }}" method="post">
        {!! csrf_field() !!}
        <label>customer_name</label></br>
        <input type="text" name="customer_name" id="customer_name" class="form-control"></br>
         <div class="form-group">

            <label for="groups_id">Category</label>
         <select name="groups_id" id="groups_id" class="form-control">

                 @foreach($Groups as $item)
                     <option value="{{ $item->id }}">{{ $item->Groups }}</option>
                 @endforeach
             </select>
         </div>
         {{-- <label>groups_id</label></br> --}}
         {{-- <input type="text" name="groups_id" id="groups_id" class="form-control"></br> --}}

        <label>mobile_no</label></br>
        <input type="text" name="mobile_no" id="mobile_no" class="form-control"></br>
        <label>email</label></br>
        <input type="text" name="email" id="email" class="form-control"></br>
        <label>gst_no</label></br>
        <input type="text" name="gst_no" id="gst_no" class="form-control"></br>

        <label>billing_address</label></br>
        <input type="text" name="billing_address" id="billing_address" class="form-control"></br>
        <label>shipping_address</label></br>
        <input type="text" name="shipping_address" id="shipping_address" class="form-control"></br>
        <div class="form-group row">
            <label for="role" >Status</label>
                <div class="form-control ">

                <select name="status"class="form-control">
           <option value="1" {{ $status ? 'selected' : '' }}>Active</option>
           <option value="0" {{ $status ? '' : 'selected' }}>Inactive</option>
       </select>
        {{-- <div class="form-group"> --}}

            {{-- <label for="categories_id">Category</label> --}}
            {{-- <select name="categories_id" id="categories_id" class="form-control"> --}}

                {{-- @foreach($categories as $item) --}}
                    {{-- <option value="{{ $item->id }}">{{ $item->categories }}</option> --}}
                {{-- @endforeach --}}
            {{-- </select> --}}
        {{-- </div> --}}
        <input type="submit" value="Save" class="btn btn-success"></br>



    </form>

  </div>
</div>

@stop
