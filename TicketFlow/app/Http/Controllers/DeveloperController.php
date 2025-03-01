<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeveloperController extends Controller
{
    public function index(){
        $tickets = Ticket::join('asignements','asignements.ticket_id','=','tickets.id')
        ->where('asignements.developer_id', Auth::id())->get();
        return view('developers.index',compact('tickets'));
    }
}
