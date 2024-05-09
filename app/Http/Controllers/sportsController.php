<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Sports;
use Illuminate\View\View;


class sportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $sports = Sports::all();
        return view ('sports.index')->with('sports', $sports);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('sports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Sports::create($input);
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
        $sports = Sports::find($id);
        return view('sports.edit')->with('sports', $sports);
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


    /**public function viewStores($categoryId)
    {
    $categories = Categories::findOrFail($categoryId);
    $sports = $categories->sports;

    return view('sports.index1', compact('sports','categories'));
     } */
}
