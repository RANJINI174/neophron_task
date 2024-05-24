@extends('layout.index')
@section('content')


<div class="card">
  <div class="card-header">View Page</div>
  <div class="card-body">


        <div class="card-body">
        <h5 class="card-title">id : {{ $categories->id }}</h5>
        <p class="card-text">categories: {{ $categories->categories }}</p>

  </div>

    </hr>

  </div>
</div>
@stop
