<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\categories;
use App\Models\SaleItems;
use App\Models\Customers;
use App\Models\Sports;
use App\Models\Sales;
use App\Models\TaxDetails;
use Illuminate\View\View;


class SaleItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {

        // $SaleItems = SaleItems::all();
        // return view ('saleItems.index')->with('SaleItems', $SaleItems);


        $sales = Sales::all();
        $SaleItems = SaleItems::all();
        $categories = categories::all();
        $customers = Customers::all();
        $Sports = Sports::all();
        // $TaxDetails = TaxDetails::all();
        $TaxDetails = TaxDetails::whereIn('id', $SaleItems->pluck('tax_id'))->get();
        return view ('saleItems.index',compact('SaleItems','sales','customers','Sports','categories','TaxDetails'));


        // $customers = Customer::all();
        // $groups = groups::all();
        // $categories = Category::all();




    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        $Sports = Sports::all();
        $categories = categories::all();
        $Sales = Sales::all();
        $TaxDetails = TaxDetails::all();
        return view('saleItems.create',compact('Sports','categories','Sales','TaxDetails'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //  $input = $request->all();
        //  SaleItems::create($input);
        //  return redirect('saleItems')->with('flash_message', 'SaleItems Addedd!');

    // Validate the request
    $validated = $request->validate([
        'sale_id' => 'required|exists:sales,id',
        'item_id' => 'required|exists:sports,id',
        'quantity' => 'required|integer',
        'unit_price' => 'required|numeric',
        'total_price' => 'required|numeric',
        'tax_id' => 'required|exists:tax_details,id',
    ]);


    // $input = $request->all();
    //  SaleItems::create($input);
    //  return redirect('saleItems')->with('flash_message', 'SaleItems Added!');
// Retrieve the tax details
$TaxDetails = TaxDetails::find($validated['tax_id']);
$taxPercentage = $TaxDetails->tax_percentage;

// $taxDetails = TaxDetails::find($validated['tax_id']);
// $taxPercentage = $taxDetails->tax_percentage;


$unitPrice = $validated['unit_price'];
$quantity = $validated['quantity'];
$taxAmount = ($unitPrice * $quantity) * ($taxPercentage / 100);
$totalPrice = ($unitPrice * $quantity) + $taxAmount;


$SaleItems = new SaleItems();
$SaleItems->sale_id = $validated['sale_id'];
$SaleItems->item_id = $validated['item_id'];
$SaleItems->quantity = $validated['quantity'];
$SaleItems->unit_price = $validated['unit_price'];
// $SaleItems->total_price = $totalPrice;
 $SaleItems->total_price = $totalPrice;
$SaleItems->save();

$SaleItems = SaleItems::where('sale_id', $validated['sale_id'])->get();


$total_price_sum = $SaleItems->sum('total_price');

// $Sales = Sales::findOrFail($id);
$Sales = Sales::findOrFail($validated['sale_id']);
$Sales->total_price = $total_price_sum;
$Sales->save();
    // Redirect to sale items list with success message
    return redirect('saleItems')->with('flash_message', 'SaleItems Added!');

    }



    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        // $Groups = Groups::find($id);
        // return view('groups.show')->with('Groups', $Groups);
        // $SaleItems = SaleItems::with('taxDetails')->where('sale_id', $id)->get();
        $Groups = Groups::all();
        // return view('sales.show',compact('Sales','Groups'));
        $Sales = Sales::findOrFail($id);
        $Customers = Customers::all();
        $sports = Sports::all();
        $categories = categories::all();
        $SaleItems = $Sales->SaleItems;
        $TaxDetails = TaxDetails::all();
        $total_price_sum = $SaleItems->sum('total_price');

        return view('sales.show',compact('Groups','Sales','Customers','categories','SaleItems','sports','total_price_sum','TaxDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $Sports = Sports::all();
        $SaleItems = SaleItems::findOrFail($id);
        $categories = categories::all();
        $TaxDetails = TaxDetails::all();
        return view('saleItems.edit',compact('SaleItems','categories','Sports','TaxDetails'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $SaleItems= SaleItems::find($id);
        $input = $request->all();
        $SaleItems->update($input);
        return redirect('saleItems')->with('flash_message', 'SaleItems Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SaleItems::destroy($id);
        return redirect('saleItems')->with('flash_message', 'SaleItems deleted!');
    }
}
