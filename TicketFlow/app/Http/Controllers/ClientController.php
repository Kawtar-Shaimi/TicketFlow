<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $tickets = Ticket::all();
        return view('client.index',compact('tickets'));
    }
}
