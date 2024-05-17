<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Customers;
use Illuminate\View\View;
use App\Models\Groups;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        // $sports = Sports::all();
        // $categories = categories::all();
        // return view ('sports.index',compact('sports','categories'));

        //return view ('sports.index')->with('sports', $sports);


         $Customers = Customers::with('Groups')->get();
           $Groups = Groups::all();
           $status =true;
        // $Groups = Groups::with('Customers')->get();

        return view('customers.index', compact('Customers', 'Groups','status'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $Customers = Customers::all();
        $Groups = Groups::all();
        $status =true;
        //return view('sports.create')->with('categories',$categories);
        return view('customers.create',compact('Customers', 'Groups','status'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Customers::create($input);
        //categories::create($input);
        return redirect('customers')->with('flash_message', 'Customers Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $Customers = Customers::find($id);
        return view('customers.show')->with('Customers', $Customers);
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
        $Customers = Customers::findOrFail($id);
        $Groups = Groups::all();
        $status =true;
        return view('customers.edit',compact('Customers', 'Groups','status'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $Customers = Customers::find($id);
        $input = $request->all();
        $Customers->update($input);
        return redirect('customers')->with('flash_message', 'customers Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Customers::destroy($id);
        return redirect('customers')->with('flash_message', 'Customers deleted!');
    }


    public function index1($groups_id)
    { return view('Customers.welcome');
    $Groups = Groups::find($id);
    $Customers = $Groups->sports;

    ///return view('sports.index1',compact('sports','categories'));
    return view('customers.index1')->with('Customers', $Customers);;
}
}
