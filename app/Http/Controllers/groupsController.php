<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Category;
use App\Models\groups;
use App\Models\Customer;
use Illuminate\View\View;


class groupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        // $customers = Customer::all();
        $groups = groups::all();
        $categories = Category::all();
         $ProductCount = groups::select('groups.id','groups.groupName')
         ->leftJoin('customers', 'groups.id', '=', 'customers.groups_id')
         ->select('groups.id','groups.groupName', Customer::raw('COUNT(customers.id) as product_count'))
         ->groupBy('groups.id','groups.groupName')
        ->get();
        return view ('customers.index', compact('groups', 'ProductCount', 'categories'));

       //return view('groups.index', compact('customers', 'groups', 'categories'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
       // return view('customers.add_groups');
        $groups = groups::all();
        return view('groups.create')->with('groups',$groups);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        groups::create($input);
        return redirect('groups')->with('flash_message', 'groups Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $groups = groups::find($id);
        return view('groups.show')->with('groups', $groups);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $groups = groups::find($id);
         return view('groups.edit',compact('groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $groups= groups::find($id);
        $input = $request->all();
        $groups->update($input);
        return redirect('groups')->with('flash_message', 'groups Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        groups::destroy($id);
        return redirect('groups')->with('flash_message', 'groups deleted!');
    }
}
