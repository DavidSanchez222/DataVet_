<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categorie::paginate(20);

        return view('admin.categories.index', compact('categories'));
    }
}
