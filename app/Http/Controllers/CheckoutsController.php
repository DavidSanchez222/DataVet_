<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutsController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::paginate(20);
        $products = Product::all();

        return view('admin.checkouts.index', compact('checkouts', 'products'));
    }

    public function delete($id)
    {
        Checkout::destroy($id);

        return back()->with('success', 'Salida eliminada exitosamente!');
    }

    public function update($id, Request $request)
    {
        $checkout = Checkout::find($id);

        $checkout->invoice_number = $request->invoice_number;
        $checkout->product_id = $request->product;
        $checkout->quantity = $request->quantity;
        $checkout->user_id = $request->user;
        $checkout->save();

        return back()->with('success', 'Salida actualizada exitosamente!');
    }
}
