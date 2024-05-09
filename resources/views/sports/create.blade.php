@extends('sports.layout')
@section('content')

<div class="card">
  <div class="card-header">Sports Page</div>
  <div class="card-body">

      <form action="{{ url('sports') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        <label>price</label></br>
        <input type="text" name="price" id="price" class="form-control"></br>
        <label>quantity</label></br>
        <input type="text" name="quantity" id="quantity" class="form-control"></br>
       <label>categories-Id</label></br>
        <input type="text" name="categories-Id" id="categories-Id" class="form-control"></br>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Save" class="btn btn-success"></br>



    </form>

  </div>
</div>

@stop
