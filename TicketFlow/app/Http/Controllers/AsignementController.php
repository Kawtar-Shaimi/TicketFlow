<?php

namespace App\Http\Controllers;

use App\Models\Asignement;
use App\Models\Developer;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsignementController extends Controller
{
    public function create(Ticket $ticket)
    {
        $developers = Developer::all();
        return view('asignements.create', compact('ticket', 'developers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'developer_id' => 'required',
            'ticket_id' => 'required',
        ]);
        Asignement::create([
            'developer_id' => $request->developer_id,
            'ticket_id' => $request->ticket_id,
            'admin_id' => Auth::id(),
        ]);
        return redirect()->route('admins.index')->with('success', 'Asignement created successfully');
    }
}
