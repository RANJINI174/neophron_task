<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\categories;
use App\Models\Sports;
use Illuminate\View\View;


class categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $categories = categories::all();
        return view ('categories.index')->with('categories', $categories);
      // $categories = categories::withCount('items')->get();
       //return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
       // return view('sports.add_categories');
        $categories = categories::all();
        return view('categories.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        categories::create($input);
        return redirect('categories')->with('flash_message', 'categories Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $categories = categories::find($id);
        return view('categories.show')->with('categories', $categories);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $categories = categories::find($id);
         return view('categories.edit')->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $categories= categories::find($id);
        $input = $request->all();
        $categories->update($input);
        return redirect('categories')->with('flash_message', 'categories Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        categories::destroy($id);
        return redirect('categories')->with('flash_message', 'categories deleted!');
    }
}
