<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\customers;
use Illuminate\View\View;
use App\Models\groups;
use App\Models\category;



class customersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $customers = customers::all();
        $groups = groups::all();
        $categories = Category::all();
        return view ('customers.index',compact('customers','groups','categories'));

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $customers =customers::all();
        $groups = groups::all();
        $status =true;
        //$status = true;
        //return view('customers.create')->with('groups',$groups);
        return view('customers.create',compact('customers', 'groups','status'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
       // $request->validate([
           // 'Name'=>'required'
        // ]);

       $input = $request->all();
       customers::create($input);
       return redirect('customers')->with('flash_message', 'Items Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $customers = customers::find($id);
        return view('customers.show')->with('customers', $customers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
     /*  $customers = customers::find($id);
        return view('customers.edit')->with('customers', $customers);
        $groups = groups::all();
        return view('customers.create')->with('groups',$groups);
        */
        $customers = customers::findOrFail($id);
        $groups = groups::all();
        $status =true;
        return view('customers.edit',compact('customers', 'groups','status'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $customers = customers::find($id);

        $input = $request->all();
        $customers->update($input);
        return redirect('customers')->with('flash_message', 'customers Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        customers::destroy($id);
        return redirect('customers')->with('flash_message', 'customers deleted!');
    }


    //public function index1($groups_id)
    //{ return view('customers.welcome');
    //$groups = groups::find($id);
    //$customers = $groups->customers;

    ///return view('customers.index1',compact('customers','groups'));
    //return view('customers.index1')->with('customers', $customers);;
}

