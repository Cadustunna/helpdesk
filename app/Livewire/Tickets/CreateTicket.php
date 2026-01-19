<?php

namespace App\Livewire\Tickets;

use App\Models\Ticket;
use App\Models\TicketMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateTicket extends Component
{
    #[Layout('layouts.app')]

    public $title;

    public $category;

    public $priority;

    public $message;

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'category' => 'required|in:Technical,Billing,Account',
            'priority' => 'required|in:High,Medium,Low',
            'message' => 'required|string'
        ];
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function store_ticket()
    {
        if (!Auth::check()) {
            abort(403);
        }

        $this->validate();

        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'category' => $this->category,
            'priority' => $this->priority,
            'status' => 'Open',
        ]);

        TicketMessage::create([
            'user_id' => Auth::id(),
            'ticket_id' => $ticket->id,
            'message' => $this->message,
        ]);

        session()->flash('success', 'You submitted a ticket!');
        $this->reset('title', 'category', 'priority', 'message');
    }

    public function render()
    {
        return view('livewire.tickets.create-ticket');
    }
}
