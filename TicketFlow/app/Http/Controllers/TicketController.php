<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        $tickets = Ticket::all();
        return view('ticket.index',compact('tickets'));
    }

    public function create(){
        return view('ticket.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=> 'required,max:15',
            'description'=> 'required',
            'status'=> 'required',
            'priority'=> 'required',
        ]);
        Ticket::create([
            'name' => $request->name,
            'description'=>$request->description,
            'status'=>$request->status,
            'priority'=>$request->priority,
        ]);
        return redirect()->route('client.index')->with('success','Ticket created successfully');
    }
}
