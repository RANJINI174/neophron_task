@extends('layout.index')
@section('content')

<div class="card">
  <div class="card-header">categories Page</div>
  <div class="card-body">

      <form action="{{ url('categories') }}" method="post">
        {!! csrf_field() !!}
        <label>id</label></br>
        <input type="text" name="id" id="id" class="form-control"></br>
        <label>categories</label></br>
        <input type="text" name="categories" id="categories" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
