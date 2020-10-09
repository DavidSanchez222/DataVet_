<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutsController extends Controller
{
    public function index(Request $request)
    {
        $checkouts = Checkout::invoice_number($request->invoice_number)
            ->products($request->product)
            ->users($request->user)
            ->created_at($request->created_at)
            ->paginate(20);;
        $products = Product::all();

        return view('admin.checkouts.index', compact('checkouts', 'products'));
    }

    public function destroy(Checkout $checkout)
    {
        $checkout->delete();

        return back()->with('success', 'Salida eliminada exitosamente!');
    }

    public function update(Checkout $checkout, Request $request)
    {
        $checkout->invoice_number = $request->invoice_number;
        $checkout->product_id = $request->product;
        $checkout->quantity = $request->quantity;
        $checkout->user_id = $request->user;
        $checkout->save();

        return back()->with('success', 'Salida actualizada exitosamente!');
    }

    public function create()
    {

    }

    public function store()
    {

    }
}
