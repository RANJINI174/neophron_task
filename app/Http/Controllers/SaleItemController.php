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
        return view ('saleItems.index',compact('SaleItems','sales','customers','Sports','categories'));


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

        return view('saleItems.create',compact('Sports','categories','Sales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        SaleItems::create($input);
        return redirect('saleItems')->with('flash_message', 'groups Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        // $Groups = Groups::find($id);
        // return view('groups.show')->with('Groups', $Groups);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $Sports = Sports::all();
        $SaleItems = SaleItems::findOrFail($id);
        $categories = categories::all();
        return view('saleItems.edit',compact('SaleItems','categories','Sports'));
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
