<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\DocumentType;
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
        $configuration_items[]= ['name' => 'Usuarios', 'quantity' => User::count(), 'url' => route('settings.users')];
        $configuration_items[]= ['name' => 'Roles', 'quantity' => Role::count(), 'url' => route('settings.roles')];
        $configuration_items[]= ['name' => 'Tipos de Documento', 'quantity' => DocumentType::count(), 'url' => route('settings.document_types')];
        $configuration_items[]= ['name' => 'Categorias', 'quantity' => Categorie::count(), 'url' => route('settings.categories')];

        return view('admin.settings', compact('configuration_items'));
    }

}
