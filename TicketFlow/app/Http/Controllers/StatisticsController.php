<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        $createdTicketsCount = Ticket::count();

        $assignedTicketsCount = Ticket::join('asignements', 'tickets.id', '=', 'asignements.ticket_id')->count();

        $finishedTicketsCount = Ticket::where('status', 'résolu')->count();

        $ticketsBySoftwareCount = Ticket::select('software', Ticket::raw('count(*) as total'))
        ->groupBy('software')
        ->orderBy('total', 'desc')
        ->get();

        $developersByFinishedTicketsCount  = Ticket::join('asignements', 'tickets.id', '=', 'asignements.ticket_id')
        ->join('users', 'asignements.developer_id', '=', 'users.id')
        ->where('tickets.status', 'résolu')
        ->select('users.id', 'users.name', Ticket::raw('count(*) as total'))
        ->groupBy('users.id', 'users.name')
        ->orderBy('total', 'desc')
        ->get();

        return view('statistics.index', compact('createdTicketsCount', 'assignedTicketsCount', 'finishedTicketsCount', 'ticketsBySoftwareCount', 'developersByFinishedTicketsCount'));
    }
}
