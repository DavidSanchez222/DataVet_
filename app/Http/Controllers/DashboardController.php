<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function users_index()
    {
        $users = User::all();

        return view('dashboard.users.users', ['users' => $users]);
    }
}
