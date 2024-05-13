@extends('groups.layout')
@section('content')

<div class="card">
  <div class="card-header">groups Page</div>
  <div class="card-body">

      <form action="{{ url('groups') }}" method="post">
        {!! csrf_field() !!}
        <label>id</label></br>
        <input type="text" name="id" id="id" class="form-control"></br>
        <label>groupName</label></br>
        <input type="text" name="groupName" id="groupName" class="form-control"></br>
        <label>groupCode</label></br>
        <input type="text" name="groupCode" id="groupCode" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
