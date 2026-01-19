
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="mb-6 text-2xl font-bold">Create Ticket</h1>

        @if (session()->has('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit="store_ticket" action="#"
              class="space-y-5 bg-white p-6 rounded-lg shadow">
            @csrf

            <div>
                <label class="block text-sm font-medium">Title</label>
                <input 
                    type="text" 
                    wire:model="title"
                    class="mt-1 w-full rounded-md border px-3 py-2 focus:ring focus:ring-blue-300"
                       >
                @error('title')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror       
            </div>

            <div>
                <label class="block text-sm font-medium">Category</label>
                <select wire:model="category"
                        class="mt-1 w-full rounded-md border px-3 py-2">
                    <option>Technical</option>
                    <option>Billing</option>
                    <option>Account</option>
                </select>
                @error('category')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror  
            </div>

             <div>
                <label class="block text-sm font-medium">Priority</label>
                <select wire:model="priority"
                        class="mt-1 w-full rounded-md border px-3 py-2">
                    <option>High</option>
                    <option>Medium</option>
                    <option>Low</option>
                </select>
                @error('priority')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror  
            </div>

            <div>
                <label class="block text-sm font-medium">Message</label>
                <textarea 
                    wire:model="message" rows="5"
                    class="mt-1 w-full rounded-md border px-3 py-2"></textarea>
                @error('message')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror           
            </div>

            <div class="flex justify-end">
                <button 
                    type="submit"
                    wire:confirm='Are you sure you want to create this ticket?'
                    class="rounded-md bg-blue-600 px-6 py-2 text-white hover:bg-blue-700">
                    Submit Ticket
                </button>
            </div>
        </form>
    </div>
