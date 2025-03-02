<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{

    public function create(){
        return view('tickets.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=> 'required|string',
            'description'=> 'required|string',
            'os'=> 'required|string',
            'software'=> 'required|string',
            'priority'=> 'required|in:low,medium,high',
        ]);

        Ticket::create([
            'client_id'=> Auth::id(),
            'title' => $request->title,
            'description'=>$request->description,
            'os'=>$request->os,
            'software'=>$request->software,
            'priority'=>$request->priority,
        ]);
        return redirect()->route('clients.index')->with('success','Ticket created successfully');
    }

    public function changeStatusView(Ticket $ticket){
        return view('tickets.change-status',compact('ticket'));
    }

    public function changeStatus(Request $request, Ticket $ticket){
        $request->validate([
            'status'=> 'required|in:en cours,résolu,fermé',
        ]);
        $ticket->update([
            'status'=>$request->status,
        ]);
        return redirect()->route('developers.index')->with('success','Ticket status changed successfully');
    }
}
