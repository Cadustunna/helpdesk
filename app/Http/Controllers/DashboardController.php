<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check())
            {
                abort(403);
            }
            $tickets = Ticket::where("user_id", Auth::user()->id)
                ->latest()
                ->get();
            $openTickets = Ticket::where("Status", "Open")->count();
            $inProgressTickets = Ticket::where("Status", "In Progress")->count();
            $resolvedTickets = Ticket::where("Status", "Closed")->count();

        return view('dashboard', compact(
            'tickets',
            'openTickets',
            'inProgressTickets',
            'resolvedTickets')
            );
    }
}
