<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DocumentTypesController extends Controller
{
    public function index(Request $request)
    {
        $document_types = DocumentType::abbreviation($request->abbreviation)->name($request->description)->paginate(20);

        return view('admin.document_types.index', compact('document_types'));
    }

    public function store(Request $request)
    {
        $document_type = new DocumentType;
        $document_type->name = $request->description;
        $document_type->abbreviation = $request->abbreviation;
        $document_type->save();

        return back()->with('success', 'Tipo de documento creado exitosamente!');
    }

    public function update(DocumentType $document_type, Request $request)
    {
        $document_type->abbreviation = $request->abbreviation;
        $document_type->name = $request->description;
        $document_type->save();

        return back()->with('success', 'Tipo de documento actualizado exitosamente!');
    }

    public function destroy(DocumentType $document_type)
    {
        try
        {
            $document_type->delete();
        }
        catch(QueryException $exception)
        {
            return back()->with('error', "El tipo de documento \"$document_type->abbreviation\" no es posible eliminarlo, ya que aún esta en uso.");
        }

        return back()->with('success', 'Tipo de documento eliminado exitosamente!');
    }
}
