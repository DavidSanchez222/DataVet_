<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutsController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::paginate(20);

        return view('admin.checkouts.index', compact('checkouts'));
    }
}
