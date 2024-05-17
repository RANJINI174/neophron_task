<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
///use App\Models\Category;
use App\Models\Groups;
use App\Models\Customers;
use Illuminate\View\View;


class groupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {

        $Groups = Groups::all();
        return view ('groups.index')->with('Groups', $Groups);




        // $customers = Customer::all();
        // $groups = groups::all();
        // $categories = Category::all();

        //  $ProductCount = groups::select('groups.id','groups.groupName')
        //  ->leftJoin('customers', 'groups.id', '=', 'customers.groups_id')
        //  ->select('groups.id','groups.groupName', Customer::raw('COUNT(customers.id) as product_count'))
        //  ->groupBy('groups.id','groups.groupName')
        // ->get();
       // return view ('customers.index', compact('groups', 'ProductCount', 'categories'));

    //    return view('groups.index', compact('customers', 'groups', 'categories'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
       // return view('customers.add_groups');
        $Groups = Groups::all();
        return view('groups.create')->with('Groups',$Groups);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Groups::create($input);
        return redirect('groups')->with('flash_message', 'groups Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $Groups = Groups::find($id);
        return view('groups.show')->with('Groups', $Groups);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $Groups = Groups::find($id);
         return view('groups.edit',compact('Groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $Groups= Groups::find($id);
        $input = $request->all();
        $Groups->update($input);
        return redirect('groups')->with('flash_message', 'Groups Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Groups::destroy($id);
        return redirect('groups')->with('flash_message', 'Groups deleted!');
    }
}
