<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;

class TicketPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Ticket $ticket): bool
    {
        return $user->is_admin || $ticket->user_id === $user->id;
    }

    public function reply(User $user, Ticket $ticket): bool
    {
        return $this->view($user, $ticket);
    }

    public function updateStatus(User $user, Ticket $ticket, string $status)
    {
        if ($user->is_admin) {
            return true;
        }

        return in_array($status, ['Open', 'Closed']);
    }

    public function close(User $user, Ticket $ticket): bool
    {
        return $user->is_admin || $ticket->user_id === $user->id;
    }

}
