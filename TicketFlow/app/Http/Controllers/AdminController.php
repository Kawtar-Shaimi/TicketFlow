<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $tickets = Ticket::with('assignement')->get();
        return view('admins.index',compact('tickets'));
    }
}
