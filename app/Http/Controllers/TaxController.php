<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Sports;
use App\Models\categories;
use Illuminate\View\View;
use App\Models\TaxDetails;

class TaxController extends Controller
{

    public function index()
    {
        $sports = Sports::all();
        $categories = categories::all();
        $tax_details = TaxDetails::all();

        return view ('taxes.index',compact('sports','categories','tax_details'));
    }


    public function create()
    {
        $tax_details = TaxDetails::all();
        $categories = categories::all();

        return view('taxes.create',compact('tax_details','categories'));
    }


    public function store(Request $request)
    {
        $input = $request->all();
        TaxDetails::create($input);
        return redirect('tax');
    }



    public function show($id)
    {
        //
        //
    }



    public function edit($id)
    {
        $tax_details = TaxDetails::findOrFail($id);
        $categories = categories::all();
        $sports = Sports::all();

        return view('taxes.edit',compact('tax_details','categories','sports'));
    }


    public function update(Request $request, $id)
    {
        $tax_details = TaxDetails::find($id);
        $input = $request->all();
        $tax_details->update($input);
        return redirect('tax')->with('flash_message', 'Item details Updated!');
    }


    public function destroy($id)
    {
        TaxDetails::destroy($id);
        return redirect('tax')->with('flash_message', 'items deleted!');
    }
}
