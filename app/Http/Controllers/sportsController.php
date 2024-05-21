<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Sports;
use Illuminate\View\View;
use App\Models\categories;

class sportsController extends Controller
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


         $sports = Sports::with('categories')->get();
           $categories = categories::all();
        // $categories = categories::with('sports')->get();

        return view('sports.index', compact('sports','categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $sports = Sports::all();
        $categories = categories::all();
        //return view('sports.create')->with('categories',$categories);
        return view('sports.create',compact('sports', 'categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Sports::create($input);
        //categories::create($input);
        return redirect('sports')->with('flash_message', 'Sports Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $sports = Sports::find($id);
        return view('sports.show')->with('sports', $sports);
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
        $sports = Sports::findOrFail($id);
        $categories = categories::all();
        return view('sports.edit',compact('sports', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $sports = Sports::find($id);
        $input = $request->all();
        $sports->update($input);
        return redirect('sports')->with('flash_message', 'sports Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Sports::destroy($id);
        return redirect('sports')->with('flash_message', 'Sports deleted!');
    }


    public function index1($categories_id)
    { return view('sports.welcome');
    $categories = categories::find($id);
    $sports = $categories->sports;

    ///return view('sports.index1',compact('sports','categories'));
    return view('sports.index1')->with('sports', $sports);;
}
}
