<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categorie::name($request->name)->paginate(20);

        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $categorie = new Categorie;
        $categorie->name = $request->name;
        $categorie->save();

        return back()->with('success', 'Categoria creada exitosamente!');
    }

    public function update($id, Request $request)
    {
        $categorie = Categorie::find($id);

        if($categorie->exists)
        {
            $categorie->name = $request->name;
            $categorie->save();
        }
        else
        {
            return back()->with('error', 'Categoria no encontrada.');
        }

        return back()->with('success', 'Categoria actualizada exitosamente!');
    }

    public function destroy($id)
    {
        try
        {
            $categorie = Categorie::find($id);

            if($categorie->exists)
            {
                $categorie->delete();
            }
            else
            {
                return back()->with('error', 'Categoria no encontrada.');
            }
        }
        catch (QueryException $exception)
        {
            return back()->with('info', "La categoria \"$categorie->name\" no se puede eliminar, hay productos en esta.");
        }

        return back()->with('success', 'Categoria eliminada exitosamente!');
    }
}
