<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\DocumentType;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

    public function settings()
    {
        $configuration_items[]= ['name' => 'Usuarios', 'quantity' => User::count(), 'url' => route('settings.users.index')];
        $configuration_items[]= ['name' => 'Roles', 'quantity' => Role::count(), 'url' => route('settings.roles')];
        $configuration_items[]= ['name' => 'Tipos de Documento', 'quantity' => DocumentType::count(), 'url' => route('settings.document_types')];
        $configuration_items[]= ['name' => 'Categorias', 'quantity' => Categorie::count(), 'url' => route('settings.categories')];

        return view('admin.settings', compact('configuration_items'));
    }

    public function stocktaking(Request $request)
    {
        $entryLogs = [];
        $checkouts = [];

        $products = Product::name($request->name)->paginate(20);

        foreach ($products as $key => $product) {
            $total_entrylogs = 0;
            $total_checkouts = 0;
            foreach ($product->entryLogs as $entryLog) {
                $total_entrylogs += $entryLog->quantity;
            }
            $entryLogs += [$product->id => $total_entrylogs];
            foreach ($product->checkouts as $checkout) {
                $total_checkouts += $checkout->quantity;
            }
            $checkouts += [$product->id => $total_checkouts];
        }

        return view('admin.stocktaking', compact('products', 'entryLogs', 'checkouts'));
    }

}
