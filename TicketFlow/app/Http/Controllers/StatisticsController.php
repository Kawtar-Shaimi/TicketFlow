<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        $createdTicketsCount = Ticket::count();

        $assignedTicketsCount = Ticket::join('asignments', 'tickets.id', '=', 'asignments.ticket_id')->count();

        $finishedTicketsCount = Ticket::where('status', 'résolu')->count();

        $ticketsBySoftwareCount = Ticket::select('software', Ticket::raw('count(*) as total'))
        ->groupBy('software')->get();

        $developersByFinishedTicketsCount  = Ticket::join('asignments', 'tickets.id', '=', 'asignments.ticket_id')
        ->join('users', 'asignments.developer_id', '=', 'users.id')
        ->where('tickets.status', 'résolu')
        ->select('users.name', Ticket::raw('count(*) as total'))
        ->groupBy('users.name')
        ->get();

        return view('statistics.index', compact('createdTicketsCount', 'assignedTicketsCount', 'finishedTicketsCount', 'ticketsBySoftwareCount', 'developersByFinishedTicketsCount'));
    }
}
