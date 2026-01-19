<?php

namespace App\Livewire\Tickets;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TicketList extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.tickets.ticket-list', [
            'tickets' => Ticket::where('user_id', Auth::user()->id)->get(),
        ]);
    }
}
