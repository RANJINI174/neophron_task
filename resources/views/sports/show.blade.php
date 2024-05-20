@extends('layout.index')
@section('content')


<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">


        <div class="card-body">
        <h5 class="card-title">Name : {{ $sports->name }}</h5>
        <p class="card-text">description: {{ $sports->description }}</p>
        <p class="card-text">price : {{ $sports->price}}</p>
        <p class="card-text">quantity : {{ $sports->quantity }}</p>
        <p class="card-text">Category Id : {{ $sports->categories_id}}</p>
  </div>

    </hr>

  </div>
</div>
