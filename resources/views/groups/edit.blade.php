@extends('groups.layout')
@section('content')

<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">

      <form action="{{ url('groups/' .$groups->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$groups->id}}" id="id" />
        <label>groupName</label></br>
        <input type="text" name="groupName" id="groupName" value="{{$groups->groupName}}" class="form-control"></br>
        <label>groupCode</label></br>
        <input type="text" name="groupCode" id="groupCode" value="{{$groups->groupCode}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
