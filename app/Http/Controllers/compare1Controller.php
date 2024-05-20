<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Customer;
use App\Models\groups;
use Illuminate\View\View;


class compare1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $customers = Customer::with('groups')->get();
        $groups = groups::with('customers')->get();

       return view('customers.index1', compact('customers', 'groups'));
        //return view('customers.create', compact('customers', 'groups'));
    }

    public function viewStores($groups_id)
{
    $groups = groups::findOrFail($groups_id);
    $customers = $groups->customers;

    return view('customers.index1', compact('customers','groups'));
}
}


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
  <form action="{{ url('sale') }}" method="post">
    @csrf

    <div class="form-group row">
     <label for="role" >Customer Name</label>
         <div class="form-control ">
              <select class="form-control" id="customer_id" name="customer_id" required focus>
              @foreach ($customers as $customer)
                  <option value="{{ $customer->id }}"  selected>{{ $customer->customer_name }}</option>
                  @endforeach
                  
              </select>
         </div>
</div>
    <div class="mb-3 mt-3">
      <label for="total_price">Total price:</label>
      <input type="number" class="form-control" id="total_price" placeholder="Enter total price" name="total_price">
    </div>


   <input type="submit" class="btn btn-primary" name="" value="submit" >
  </form><a href="{{ url('store') }}"><button class='btn btn-primary float-end '>Back to home</button></a>

</div>
</body>
</html>

------
s
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Store;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class SaleController extends Controller
{


    public function index()
    {
        $sales = Sale::all();
        $categories = Category::all();
        $customers = Customer::all();
        return view ('sales.index',compact('sales','categories','customers'));
    }

    public function create()
    {
        $sales = Sale::all();
        $customers = Customer::all();

        return view('sales.create',compact('sales','customers'));
    }


    public function store(Request $request)
    {
        $input = $request->all();
        Sale::create($input);
        return redirect('sale')->with('flash_message', 'Items Addedd!');
    }


    public function show($id)
    {
        $sales = Sale::findOrFail($id);
        $customers = Customer::all();
        $stores = Store::all();
        $categories = Category::all();
        $sale_items = $sales->saleItem;

        $total_price_sum = $sale_items->sum('total_price');

        return view('sales.show',compact('sales','customers','categories','sale_items','stores','total_price_sum'));
    }


    public function edit($id)
    {
        $sales = Sale::findOrFail($id);
        $customers = Customer::all();
        return view('sales.edit',compact('sales','customers'));
    }


    public function update(Request $request, $id)
    {
        $sales = Sale::find($id);
        $input = $request->all();
        $sales->update($input);
        return redirect('sale')->with('flash_message', 'Item details Updated!');
    }



    public function destroy($id)
    {
        Sale::destroy($id);
        return redirect('sale')->with('flash_message', 'items deleted!');
    }

    public function addcart($id)
    {
        $sales = Sale::findOrFail($id);
        $stores = Store::all();
        $category = Category::all();

     return view('sales.addcart',compact('stores','category','sales'));
    }

    public function show2(Request $request, $id){
        $input = $request->all();
        SaleItem::create($input);

        $sales = Sale::findOrFail($id);
        $customers = Customer::all();
        $stores = Store::all();
        $tax_details = TaxDetail::all();
        $categories = Category::all();
//         $sale_items = $sales->saleItem;
//         // Creating or updating a SaleItem
// $saleItem = new SaleItem();
// $saleItem->item_id = $itemId; // Set the item_id from request or elsewhere
// $saleItem->quantity = $quantity; // Set the quantity from request or elsewhere
// $saleItem->unit_price = $unitPrice; // Set the unit price from request or elsewhere

// // Calculate and set the total price
// $saleItem->calculateTotalPrice();

// // Save the SaleItem
// $saleItem->save();


        $total_price_sum = $sale_items->sum('total_price');

        return view('sales.show',compact('tax_details','sales','customers','categories','sale_items','stores','total_price_sum'));
    }


    public function viewInvoice(int $id){
        $sales = Sale::findOrFail($id);

        $customers = Customer::all();
        $stores = Store::all();
        $categories = Category::all();
        $sale_items = $sales->saleItem;

        $total_price_sum = $sale_items->sum('total_price');

        return view('sales.invoice.view_invoice',compact('sales','customers','categories','sale_items','stores','total_price_sum'));
    }

    public function generateInvoice(int $id){
        $sales = Sale::findOrFail($id);

        $data = ['sales' => $sales];
        $todaydate = Carbon::now()->format('d-m-Y');
        $pdf = Pdf::loadView('sales.invoice.view_invoice', $data);
        return $pdf->download('invoice'.$sales->id.'-'.$todaydate.'pdf');
    }
}
