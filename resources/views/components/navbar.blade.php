<nav class="bg-gray-900 text-white">
    <div class="mx-auto max-w-7xl px-4 flex h-16 items-center">

        <!-- Logo -->
        <a wire:navigate href="{{ route('dashboard') }}" class="flex items-center">
            <div class="flex h-8 w-8 items-center justify-center rounded-md bg-gray-700">
                <x-app-logo-icon class="h-5 w-5 text-white" />
            </div>
        </a>

        <!-- Center -->
        <div class="mx-auto hidden md:flex space-x-6">
            <a wire:navigate href="{{ route('dashboard') }}" class="hover:text-gray-300">Dashboard</a>
            <a wire:navigate href="{{ route('tickets.index') }}" class="hover:text-gray-300">Tickets</a>
            <a wire:navigate href="{{ route('tickets.create') }}" class="hover:text-gray-300">Create Ticket</a>
        </div>

        <!-- Search -->
        <div class="flex items-center space-x-2">
            <input type="text"
                placeholder="Search"
                class="rounded-md bg-gray-800 px-3 py-1 text-sm text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <button
                wire:click='"search'
                class="rounded-md bg-blue-600 px-4 py-1 text-sm hover:bg-blue-700">
                Search
            </button>
        </div>

        <!-- Right -->
        <div class="ml-auto flex items-center space-x-6">
            @auth
                <!-- Profile Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button
                        @click="open = !open"
                        class="flex items-center space-x-2 hover:text-gray-300"
                    >
                        <span>{{ auth()->user()->name }}</span>
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293
                                  a1 1 0 111.414 1.414l-4 4a1 1 0
                                  01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div
                        x-show="open"
                        @click.away="open = false"
                        x-transition
                        class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-md shadow-lg"
                    >
                        <a href="#"
                           class="block px-4 py-2 hover:bg-gray-100">
                            Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                type="submit"
                                class="w-full text-left px-4 py-2 hover:bg-gray-100"
                            >
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>

            @else
                <!-- Guest Links -->
                <a href="{{ route('login') }}" class="hover:text-gray-300">Login</a>
                <a href="{{ route('register') }}" class="hover:text-gray-300">Register</a>
            @endauth

        </div>
    </div>
</nav>
