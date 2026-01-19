<?php

use App\Http\Controllers\DashboardController;
use App\Livewire\Tickets\CreateTicket;
use App\Livewire\Tickets\TicketList;
use App\Livewire\Tickets\TicketShow;
use App\Models\Ticket;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(middleware: ['auth', 'verified'])
//     ->name('dashboard');

Route::middleware(['auth'])->get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile.edit');

Route::middleware('auth')->group(function() {
    Route::get('/tickets', TicketList::class)->name('tickets.index');
    Route::get('/tickets/create', CreateTicket::class)->name('tickets.create');
    Route::get('/tickets/{id}', TicketShow::class)->name('tickets.show');
});

require __DIR__.'/auth.php';


