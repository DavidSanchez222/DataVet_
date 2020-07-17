<?php

namespace App\Http\Controllers;

use App\Models\EntryLog;
use Illuminate\Http\Request;

class EntryLogsController extends Controller
{
    public function index()
    {
        $entry_logs = EntryLog::paginate(20);

        return view('admin.entry_logs.index', compact('entry_logs'));
    }
}
