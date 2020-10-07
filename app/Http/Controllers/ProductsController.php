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

    public function update($id, Request $request)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->barcode = $request->barcode;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->iva = $request->iva;
        $product->categorie_id = $request->categorie;
        $product->save();

        return back()->with('success', 'Producto actualizado exitosamente!');
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return back()->with('success', 'Producto eliminado exitosamente!');
    }
}
