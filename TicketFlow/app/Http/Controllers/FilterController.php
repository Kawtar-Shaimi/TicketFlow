<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilterController extends Controller
{
    public function adminSearch(Request $request)
    {
        $request->validate([
            'query' => 'required',
        ]);
        $tickets = Ticket::where('title', 'like', '%' . $request->search . '%')
        ->orWhere('description', 'like', '%' . $request->search . '%')->get();
        return view('admins.index', compact('tickets'));
    }

    public function clientSearch(Request $request)
    {
        $request->validate([
            'query' => 'required',
        ]);
        $tickets = Ticket::where('client_id', Auth::id())
        ->where('title', 'like', '%' . $request->search . '%')
        ->orWhere('description', 'like', '%' . $request->search . '%')->get();
        return view('clients.index', compact('tickets'));
    }

    public function developerSearch(Request $request)
    {
        $request->validate([
            'query' => 'required',
        ]);
        $tickets = Ticket::join('asignements', 'asignements.ticket_id', '=', 'tickets.id')
        ->where('asignements.developer_id', Auth::id())
        ->where('title', 'like', '%' . $request->search . '%')
        ->orWhere('description', 'like', '%' . $request->search . '%')->get();
        return view('developers.index', compact('tickets'));
    }

    public function getAdminTicketsByStatus(Request $request)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $tickets = Ticket::where('status', $request->status)->get();
        return view('admins.index', compact('tickets'));
    }

    public function getClientTicketsByStatus(Request $request)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $tickets = Ticket::where('client_id', Auth::id())
        ->where('status', $request->status)->get();
        return view('clients.index', compact('tickets'));
    }

    public function getDeveloperTicketsByStatus(Request $request)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $tickets = Ticket::join('asignements', 'asignements.ticket_id', '=', 'tickets.id')
        ->where('asignements.developer_id', Auth::id())
        ->where('status', $request->status)->get();
        return view('developers.index', compact('tickets'));
    }

    public function getAdminTicketsByPriority(Request $request)
    {
        $request->validate([
            'priority' => 'required',
        ]);
        $tickets = Ticket::where('priority', $request->priority)->get();
        return view('admins.index', compact('tickets'));
    }

    public function getClientTicketsByPriority(Request $request)
    {
        $request->validate([
            'priority' => 'required',
        ]);
        $tickets = Ticket::where('client_id', Auth::id())
        ->where('priority', $request->priority)->get();
        return view('clients.index', compact('tickets'));
    }

    public function getDeveloperTicketsByPriority(Request $request)
    {
        $request->validate([
            'priority' => 'required',
        ]);
        $tickets = Ticket::join('asignements', 'asignements.ticket_id', '=', 'tickets.id')
        ->where('asignements.developer_id', Auth::id())
        ->where('priority', $request->priority)->get();
        return view('developers.index', compact('tickets'));
    }
}
