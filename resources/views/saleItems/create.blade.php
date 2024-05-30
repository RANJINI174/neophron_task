
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
  <form action="{{ url('saleItems') }}" method="post">
    @csrf
    <div class="form-group row">
     <label for="role" >Invoice Number</label>
         <div class="form-control ">
              <select class="form-control" id="sale_id" name="sale_id" required focus>
              @foreach ($Sales as $sale)
                  <option value="{{ $sale->id }}"  selected>{{ $sale->invoice_no }}</option>
                  @endforeach
                  <option value="Select categoy" disabled selected>Select Invoice No</option>
              </select>
         </div>
</div>
<div class="form-group row">
     <label for="role" >Product Name</label>
         <div class="form-control ">
              <select class="form-control" id="item_id" name="item_id" required focus>
              @foreach ($Sports as $sports)
                  <option value="{{ $sports->id }}"  selected>{{ $sports->name }}</option>
                  @endforeach
                  <option value="Select categoy" disabled selected>Select product Name</option>
              </select>
         </div>
</div>
    <div class="mb-3 mt-3">
      <label for="quantity">Quantity:</label>
      <input type="number" class="form-control" id="quantity" placeholder="Enter Quantity" name="quantity">
    </div>
    <div class="mb-3 mt-3">
      <label for="unit_price">Unit price:</label>
      <input type="number" class="form-control" id="unit_price" placeholder="Enter unit price" name="unit_price">
    </div>
    <div class="mb-3 mt-3">
      <label for="unit_price">tax_name:</label>
      <input type="text" class="form-control" id="tax_id" placeholder="Enter tax name" name="tax_id">
    </div>
    <div class="mb-3 mt-3">
        <label for="total_price">total_price:</label>
        <input type="number" class="form-control" id="total_price" placeholder="Enter unit price" name="total_price">
      </div>



   <input type="submit" class="btn btn-primary" name="" value="submit" >
  {{-- </form><a href="{{ url('sports') }}"><button class='btn btn-primary float-end '>Back to home</button></a> --}}

</div>
</body>
</html>
