@extends('layout.index')
@section('content')


<div class="card">
  <div class="card-header">customers Page</div>
  <div class="card-body">


        <div class="card-body">
        <h5 class="card-title">name : {{ $customers->name }}</h5>
        {{-- <p class="card-text">groups_id: {{ $customers->groups_id }}</p> --}}
        <p class="card-text">mobile_no : {{ $customers->mobile_no}}</p>
        <p class="card-text">email : {{ $customers->email }}</p>
        <p class="card-text">gst_no : {{ $customers->gst_no  }}</p>
        <p class="card-text">billing_address : {{ $customers->billing_address }}</p>
        <p class="card-text">shiping_address : {{ $customers->shiping_address }}</p>
        <p class="card-text">Status : {{ $customers->Status }}</p>

  </div>

    </hr>

  </div>
</div>
