<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Sales;
use App\Models\categories;
use App\Models\Sports;
use App\Models\Groups;
use App\Models\Customers;
use Illuminate\View\View;
use App\Models\SaleItems;
use App\Models\TaxDetails;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {

        $sales = Sales::all();
       // $sales = Sales::with('customers')->get();
        $categories = categories::all();
        $customers = Customers::all();
        return view ('sales.index',compact('sales','categories','customers'));


        // $Sales = Sales::with('items')->get();
    //    $SaleItems = SaleItems::with('Sales')->get();
        // return view('sales.index', compact('Sales','SaleItems'));

        //$sales = Sales::all();
        // $sales = Sales::with('customer')->get();
        // return view('sales.index', compact('sales'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $Sales = Sales::all();
        $customers = Customers::all();
        //$status =true;
        //return view('sports.create')->with('categories',$categories);
        return view('sales.create',compact('Sales', 'customers'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Sales::create($input);
        //categories::create($input);
        return redirect('sales')->with('flash_message', 'Sales Addedd!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        // $Sales = Sales::find($id);
         $Groups = Groups::all();
        // return view('sales.show',compact('Sales','Groups'));
        $Sales = Sales::findOrFail($id);
        $Customers = Customers::all();
        $sports = Sports::all();
        $categories = categories::all();
        $SaleItems = $Sales->SaleItems;
        $total_price_sum = $SaleItems->sum('total_price');

        return view('sales.show',compact('Groups','Sales','Customers','categories','SaleItems','sports','total_price_sum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
     /*  $sports = Sports::find($id);
        return view('sports.edit')->with('sports', $sports);
        $categories = categories::all();
        return view('sports.create')->with('categories',$categories);
        */
        $Sales = Sales::findOrFail($id);
        $SaleItems = SaleItems::all();
        $Customers = Customers::all();
        //$status =true;
        return view('sales.edit',compact('Sales', 'SaleItems','Customers'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $Sales = Sales::find($id);
        $input = $request->all();
        $Sales->update($input);
        return redirect('sales')->with('flash_message', 'customers Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Sales::destroy($id);
        return redirect('sales')->with('flash_message', 'items deleted!');
    }


    public function admincart($id)
    {
        $sales = Sales::findOrFail($id);
        $sports = Sports::all();
        $categories = categories::all();
        $tax_details = TaxDetails::all();

     return view('sales.admincard',compact('sports','categories','sales','tax_details'));
    }

    public function show2(Request $request, $id){
        // Validate the request data
    $validated = $request->validate([
        'sale_id' => 'required|exists:sales,id',
        'item_id' => 'required|exists:sports,id',
        'quantity' => 'required|integer',
        'unit_price' => 'required|numeric',
        'tax_id' => 'required|exists:tax_details,id',
    ]);

    $taxDetails = TaxDetails::find($validated['tax_id']);
    $taxPercentage = $taxDetails->tax_percentage;

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

    $SaleItems = SaleItems::where('sale_id', $id)->get();


    $total_price_sum = $SaleItems->sum('total_price');

    $Sales = Sales::findOrFail($id);
    $Sales->total_price = $total_price_sum;
    $Sales->save();



    $Sales = Sales::findOrFail($id);
    $Customers = Customers::all();
    $sports = Sports::all();
    $tax_details = TaxDetails::all();
    $categories = categories::all();





    return view('sales.show', compact('Sales', 'Customers', 'categories', 'sports', 'SaleItems', 'total_price_sum','tax_details'));
}


    public function index1($SaleItem_id)
    {
        return view('Sales.welcome');
    $SaleItems = SaleItems::find($id);
    $Sales = $SaleItems->sports;

    ///return view('sports.index1',compact('sports','categories'));
    return view('sales.index1')->with('Sales', $Sales);;
}

public function viewInvoice(int $id){
    $Sales = Sales::findOrFail($id);

    $Customers = Customers::all();
    $sports = Sports::all();
    $categories = categories::all();
    $SaleItems = $Sales->SaleItems;

    $total_price_sum = $SaleItems->sum('total_price');

    return view('sales.invoice.view_invoice',compact('Sales','Customers','categories','SaleItems','sports','total_price_sum'));
}


public function generateInvoice(int $id){
    $Sales = Sales::findOrFail($id);
    $customers = Customers::all();
    $sports = Sports::all();
    $categories = categories::all();
    $SaleItems = $Sales->SaleItems;
    $total_price_sum = $SaleItems->sum('total_price');

    $data = [
        'Sales' => $Sales,
        'customers' => $customers,
        'sports' => $sports,
        'categories' => $categories,
        'SaleItems' => $SaleItems,
        'total_price_sum' => $total_price_sum
    ];

    $todaydate = Carbon::now()->format('d-m-Y');
    $pdf = Pdf::loadView('sales.invoice.view_invoice', $data);
    return $pdf->download('invoice'.$Sales->id.'-'.$todaydate.'.pdf');
}





public function show3(Request $request, $id){
    $input = $request->all();
    SaleItems::create($input);

}
}
