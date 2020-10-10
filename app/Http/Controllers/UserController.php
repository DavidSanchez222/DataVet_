<?php

namespace App\Http\Controllers;

use App\Models\{DocumentType, Role, User};
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::name($request->name)->email($request->email)->phone($request->phone)->documenttype($request->document_type)->number_id($request->number_id)->paginate(20);
        $document_types = DocumentType::orderBy('abbreviation', 'ASC')->get();
        $roles = Role::orderBy('name', 'ASC')->get();

        return view('admin.users.index', compact('users', 'document_types', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->nickname = $request->nickname;
        $user->document_type_id = $request->document_type_id;
        $user->number_id = $request->number_id;
        $user->phone = $request->phone;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->save();

        return back()->with('success', 'Usuario actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(!isset($user)) {
            $status = 'error';
            $message = 'Usuario no encontrado o no existe';
        }else {
            $user->delete();
            $status = 'success';
            $message = 'Usuario eliminado exitosamente';
        }

        return back()->with($status, $message);
    }
}
