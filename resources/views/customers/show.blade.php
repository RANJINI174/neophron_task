@extends('customers.layout')
@section('content')


<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">


        <div class="card-body">
        <h5 class="card-title">Name : {{ $customers->name }}</h5>
        <p class="card-text">Group: {{ $customers->Group }}</p>
        <p class="card-text">Mobile_no : {{ $customers->Mobile_no}}</p>
        <p class="card-text">Email id : {{ $customers->Email id }}</p>
        <p class="card-text">GST No : {{ $customers->GST No  }}</p>
        <p class="card-text">Billing Address : {{ $customers->Billing Address }}</p>
        <p class="card-text">Shpping Address : {{ $customers->Shpping Address }}</p>
        <p class="card-text">Status : {{ $customers->Status }}</p>
       
  </div>

    </hr>

  </div>
</div>
