<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(20);

        return view('admin.roles.index', compact('roles'));
    }
}
