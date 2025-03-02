<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilterController extends Controller
{
    private function filter(Request $request, $query)
    {
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if(isset($request->status)){
            $query->where('status', $request->status);
        }

        if(isset($request->priority)){
            $query->where('priority', $request->priority);
        }

        return $query;
    }

    public function adminFilter(Request $request)
    {
        $query = Ticket::query();

        $tickets = $this->filter($request, $query)->get();

        return view('admins.index', compact('tickets'));
    }

    public function clientFilter(Request $request)
    {
        $query = Ticket::where('client_id', Auth::id());

        $tickets = $this->filter($request, $query)->get();

        return view('clients.index', compact('tickets'));
    }

    public function developerFilter(Request $request)
    {
        $query = Ticket::join('asignements', 'asignements.ticket_id', '=', 'tickets.id')
        ->where('asignements.developer_id', Auth::id());

        $tickets = $this->filter($request, $query)->get();

        return view('developers.index', compact('tickets'));
    }

}
