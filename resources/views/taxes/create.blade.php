@extends('layout.index')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Items</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Items</title>
</head>
<body>
<div class="container mt-3">
  <h2>Your Product</h2>
  <form action="{{ url('tax') }}" method="post">
    @csrf
  <div class="mb-3 mt-3">
      <label for="tax_name">Tax Name:</label>
      <input type="text" class="form-control" id="tax_name" placeholder="Enter Tax Name" name="tax_name">
    </div>
    <div class="mb-3 mt-3">
      <label for="tax_percentage">Tax Percentage:</label>
      <input type="number" class="form-control" id="tax_percentage" placeholder="Enter Tax Percentage" name="tax_percentage">
    </div>




   <input type="submit" class="btn btn-primary" name="" value="submit" >
 

</div>
</body>
</html>
@stop
