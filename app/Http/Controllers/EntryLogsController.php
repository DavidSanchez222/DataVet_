<?php

namespace App\Http\Controllers;

use App\Models\EntryLog;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;

class EntryLogsController extends Controller
{
    public function index(Request $request)
    {
        $entry_logs = EntryLog::purchase_order($request->purchase_order)
            ->products($request->product)
            ->providers($request->provider)
            ->users($request->user)
            ->created_at($request->created_at)
            ->paginate(20);

        $products = Product::all();
        $providers = Provider::all();

        return view('admin.entry_logs.index', compact('entry_logs', 'products', 'providers'));
    }

    public function destroy($id)
    {
        EntryLog::destroy($id);

        return back()->with('success', 'Entrada eliminada exitosamente!');
    }

    public function update($id, Request $request)
    {
        $entry_log = EntryLog::find($id);

        $entry_log->purchase_order = $request->purchase_order;
        $entry_log->product_id = $request->product;
        $entry_log->quantity = $request->quantity;
        $entry_log->provider_id = $request->provider;
        $entry_log->user_id = $request->user;
        $entry_log->save();

        return back()->with('success', 'Entrada actualizada exitosamente!');
    }

    public function create()
    {

    }

    public function store()
    {

    }
}
