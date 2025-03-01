<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function create(){
        return view('tickets.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=> 'required,max:15',
            'description'=> 'required',
            'status'=> 'required|in:en cours,résolu,fermé',
            'priority'=> 'required|in:low,medium,high',
        ]);
        Ticket::create([
            'name' => $request->name,
            'description'=>$request->description,
            'status'=>$request->status,
            'priority'=>$request->priority,
        ]);
        return redirect()->route('clients.index')->with('success','Ticket created successfully');
    }

    public function changeStatusView(Ticket $ticket){
        return view('tickets.change.status',compact('ticket'));
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
