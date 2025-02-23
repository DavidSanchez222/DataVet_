<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::name($request->name)->paginate(20);

        return view('admin.roles.index', compact('roles'));
    }

    public function update(Role $role, Request $request)
    {
        $role->name = $request->name;
        $role->save();

        return back()->with('success', 'Rol actualizado exitosamente!');
    }

    public function store(Request $request)
    {
        $role = new Role;
        $role->name = $request->name;
        $role->save();

        return back()->with('success', 'Rol creado exitosamente!');
    }

    public function destroy(Role $role)
    {
        if (!$role->users->count()) {
            $role->delete();
        }else {
            return back()->with('info', "El rol \"$role->name\" no se puede eliminar, existen usuarios con este rol.");
        }

        return back()->with('success', 'Rol eliminado exitosamente!');
    }
}
