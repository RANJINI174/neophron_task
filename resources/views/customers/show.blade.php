@extends('layout.index')
@section('content')


<div class="card">
  <div class="card-header">customers Page</div>
  <div class="card-body">


        <div class="card-body">
        <h5 class="card-title">name : {{ $Customers->name }}</h5>
        {{-- <p class="card-text">groups_id: {{ $customers->groups_id }}</p> --}}
        <p class="card-text">mobile_no : {{ $Customers->mobile_no}}</p>
        <p class="card-text">email : {{ $Customers->email }}</p>
        <p class="card-text">gst_no : {{ $Customers->gst_no  }}</p>
        <p class="card-text">billing_address : {{ $Customers->billing_address }}</p>
        <p class="card-text">shiping_address : {{ $Customers->shiping_address }}</p>
        <p class="card-text">Status : {{ $Customers->Status }}</p>

  </div>

    </hr>

  </div>
</div>
@stop
