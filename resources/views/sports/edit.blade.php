@extends('layout.index')
@section('content')

<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">

      <form action="{{ url('sports/' .$sports->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$sports->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$sports->name}}" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" value="{{$sports->description}}" class="form-control"></br>
        <label>Price</label></br>
        <input type="text" name="price" id="price" value="{{$sports->price}}" class="form-control"></br>
        <label>quantity</label></br>
        <input type="text" name="quantity" id="quantity" value="{{$sports->quantity}}" class="form-control"></br>
        <div class="form-group">

            <label for="categories">Category</label>
            <select name="categories_id" id="categories_id" class="form-control">

                @foreach($categories as $item)
                  {{-- <option value="{{ $item->id }}">{{ $item->categories }}</option> --}}
                  <option value="{{ $item->id }}" {{ $item->id == $sports->categories_id ? 'selected' : '' }}>
                    {{ $item->categories }}
                </option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
