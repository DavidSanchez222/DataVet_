<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;

class DocumentTypesController extends Controller
{
    public function index()
    {
        $document_types = DocumentType::paginate(20);

        return view('admin.document_types.index', compact('document_types'));
    }
}
