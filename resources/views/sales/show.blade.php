@extends('sports.layout')
@section('content')


<div class="card">
  <div class="card-header">View Page</div>
  <div class="card-body">


        <div class="card-body">
        <h5 class="card-title">id : {{ $groups->id }}</h5>
        <p class="card-text">customer_name: {{ $groups->customer_name }}</p>
        <p class="card-text">customer_id: {{ $groups->customer_id }}</p>
        <p class="card-text">total_price: {{ $groups->total_price }}</p>

  </div>

    </hr>

  </div>
</div>
