<?php

namespace App\Livewire\Tickets;

use App\Models\Ticket;
use App\Models\TicketMessage;
use App\Models\User;
use App\Notifications\TicketMessageNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class TicketShow extends Component
{
    #[Layout('layouts.app')]

    public $message;

    public Ticket $ticket;

    public function mount($id)
    {
        $this->ticket = Ticket::findOrFail($id);
    }

    public function sendMessage()
    {
        $this->authorize('reply', $this->ticket);

        $this->validate([
            'message' => 'required|string|max:2000',
        ]);

        $message = $this->ticket->messages()->create([
                'ticket_id' => $this->ticket->id,
                'user_id' => Auth::id(),
                'message' => $this->message,
        ]);

        // NOTIFICATIONS
        $this->notifyParties($message);

        $this->message = '';

        $this->dispatch('messageSent');
    }

    protected function notifyParties(TicketMessage $message)
    {
        // User sent message → notify admins
        if (! Auth::user()->is_admin) {
            User::where('is_admin', true)->each(
                fn ($admin) =>
                    $admin->notify(
                        new TicketMessageNotification($this->ticket, $message)
                    )
            );
        }

        // Admin sent message → notify ticket owner
        if (Auth::user()->is_admin) {
            $this->ticket->user->notify(
                new TicketMessageNotification($this->ticket, $message)
            );
        }
    }

    public function closeTicket()
    {
        if ($this->ticket->status !== 'Open') {
            abort(403);
        }

        if (
            Auth::id() !== $this->ticket->user_id &&
            !Auth::user()->is_admin
        ) {
            abort(403);
        }

        $this->ticket->update([
            'status' => 'Closed',
        ]);
    }

    public function render()
    {
        return view('livewire.tickets.ticket-show', [
            'messages' => $this->ticket
            ->messages()
            ->with('user')
            ->latest()
            ->get(),
        ]);
    }
}
