<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Sports;
use App\Models\categories;
//use App\Models\customers;
//use App\Models\groups;
use Illuminate\View\View;


class compareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sports = Sports::with('categories')->get();
        $categories = categories::with('sports')->get();

        return view('sports.index1', compact('sports', 'categories'));
    }

    public function viewStores($categories_id)
{
    $categories = categories::findOrFail($categories_id);
    $sports = $categories->sports;

    return view('sports.index1', compact('sports','categories'));
}
}



