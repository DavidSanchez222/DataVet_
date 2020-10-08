<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::category($request->categorie)->name($request->name)->barcode($request->barcode)->paginate(20);
        $categories = Categorie::all();

        if(isset($request->message))
        {
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

    public function update(Product $product, Request $request)
    {
        $product->name = $request->name;
        $product->barcode = $request->barcode;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->iva = $request->iva;
        $product->categorie_id = $request->categorie;
        $product->save();

        return back()->with('success', 'Producto actualizado exitosamente!');
    }

    public function destroy(Product $product)
    {
        $product->checkouts()->delete();
        $product->entryLogs()->delete();
        $product->delete();

        return back()->with('success', 'Producto eliminado exitosamente!');
    }
    // O380e2AaqsFm

    // Los instructores deberían estar a la vanguardia tecnológica de hoy en día, y no solo quedarse con lo que aprendieron alguna vez, esto con el fin de, aparte de enseñar lo básico, también aumentar la competitividad del aprendiz frente al mercado tecnológico tanto tradicional como actual y futuro.
}
