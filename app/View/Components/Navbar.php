<?php

namespace App\View\Components;

use App\Models\Ticket;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Livewire\Attributes\Url;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    #[Url()]
    public $search = '';

    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar', [
        'search' => Ticket::latest()->where('title', 'like', "%{$this->search}%")->get()
        ]);
    }
}
