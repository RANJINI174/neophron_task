<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Customer;
use App\Models\groups;
use Illuminate\View\View;


class compareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $customers = Customer::with('groups')->get();
        $groups = groups::with('customers')->get();

        return view('customers.index1', compact('customers', 'groups'));
    }

    public function viewStores($groups_id)
{
    $groups = groups::findOrFail($groups_id);
    $customers = $groups->customers;

    return view('customers.index1', compact('customers','groups'));
}
}

