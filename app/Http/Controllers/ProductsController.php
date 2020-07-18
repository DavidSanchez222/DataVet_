<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate(20);
        $categories = Categorie::all();

        if(isset($request->message)){
            $message = $request->message;
        }

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->barcode = $request->barcode;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->iva = $request->iva;
        $product->categorie_id = $request->categorie;
        $product->save();

        return back()->with('success', 'Producto creado exitosamente!');
    }
}
