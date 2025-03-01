<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index(){
        $tickets = Ticket::where('client_id', Auth::id())->get();
        return view('clients.index',compact('tickets'));
    }
}
