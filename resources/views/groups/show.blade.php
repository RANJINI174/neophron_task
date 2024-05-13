@extends('groups.layout')
@section('content')


<div class="card">
  <div class="card-header">View Page</div>
  <div class="card-body">


        <div class="card-body">
        <h5 class="card-title">id : {{ $groups->id }}</h5>
        <p class="card-text">groupName: {{ $groups->groupName }}</p>
        <p class="card-text">groupCode: {{ $groups->groupCode }}</p>

  </div>

    </hr>

  </div>
</div>
