<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Sales;
use App\Models\Category;
use App\Models\Customers;
use Illuminate\View\View;
use App\Models\SaleItems;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {

        $sales = Sales::all();
        $categories = Category::all();
       // $customers = Customers::all();
        return view ('sales.index',compact('sales','categories'));


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
        $Sales = Sales::find($id);
        return view('sales.show')->with('Sales', $Sales);
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
        //$status =true;
        return view('sales.edit',compact('Sales', 'SaleItems'));

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
        return redirect('sales')->with('flash_message', 'Customers deleted!');
    }


    public function index1($SaleItem_id)
    { return view('Sales.welcome');
    $SaleItems = SaleItems::find($id);
    $Sales = $SaleItems->sports;

    ///return view('sports.index1',compact('sports','categories'));
    return view('sales.index1')->with('Sales', $Customers);;
}

public function generateInvoice(int $id){
    $sales = Sales::findOrFail($id);

    $data = ['sales' => $sales];
    $todaydate = Carbon::now()->format('d-m-Y');
    $pdf = Pdf::loadView('sales.invoice.view_invoice', $data);
    return $pdf->download('invoice'.$sales->id.'-'.$todaydate.'pdf');
}
}
