@extends('sports.layout')
@section('content')

<div class="card">
  <div class="card-header">Update the Product details</div>
  <div class="card-body">

      <form action="{{ url('saleItem/' .$sale_items->id) }}" method="post">
        @csrf
        @method("PATCH")
        <label>Sales Id</label></br>
        <input type="number" name="item_id" id="item_id" value="{{$sale_items->item_id}}" class="form-control"></br>

        <div class="form-group row">
          <label for="role" >Product Name</label>
         <div class="form-control ">
              <select class="form-control" id="item_id" name="item_id" required focus>
              @foreach ($stores as $store)
                  <option value="{{ $store->id }}"  selected>{{ $store->name }}</option>
                  @endforeach

              </select>
         </div>
         </div>

        <label>Quantity</label></br>
        <input type="number" name="quantity" id="quantity" value="{{$sale_items->quantity}}" class="form-control"></br>
        <label>Unit Price</label></br>
        <input type="textarea" name="unit_price" id="unit_price" value="{{$sale_items->unit_price}}" class="form-control"></br>



       <br> <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
