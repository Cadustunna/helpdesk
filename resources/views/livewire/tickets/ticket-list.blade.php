
    <div class="max-w-7xl mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">My Tickets</h1>
            <a href="{{ route('tickets.create') }}"
               class="rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                + Create Ticket
            </a>
        </div>

        <div class="bg-white rounded-lg shadow">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="p-4">#</th>
                        <th class="p-4">Title</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Priority</th> 
                        <th class="p-4">Created</th>
                        <th class="p-4">Action</th>
                    </tr>
                </thead>
                <tbody class="text-left justify-end">
                    @php
                    $i = 0;
                    @endphp
                    @foreach ($tickets as $ticket)
                    @php
                    $i++;
                    @endphp
                        <tr class="border-t">
                            <td class="p-4">{{ $i }}</td>
                            <td class="p-4 font-medium">{{ $ticket->title }}</td>
                            <td class="p-4">
                                <span class="rounded-full px-3 py-1 text-xs                  
                                    {{ $ticket->status === 'open' ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-700' }} 
                                    {{ $ticket->status === 'close' ? 'bg-red-100 text-red-700' : 'bg-gray-200 text-gray-700' }}>
                                    {{ $ticket->status === 'in progress' ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-200 text-gray-700' }}">
                                    {{ ucfirst($ticket->status) }}
                                </span>
                            </td>
                            <td class="p-4">
                                <span class="rounded-full px-3 py-1 text-xs
                                    {{ $ticket->priority === 'high' ? 'bg-red-300 text-red-700' : 'bg-gray-200 text-gray-700'}}>
                                    {{ $ticket->priority === 'medium' ? 'bg-yellow-300 text-yellow-700' : 'bg-gray-200 text-gray-700'}}>
                                    {{ $ticket->priority === 'low' ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-700'}}">
                                    {{ ucfirst($ticket->priority) }}
                                </span>
                            </td>
                            <td class="p-4 text-sm text-gray-600">
                                {{ $ticket->created_at->diffForHumans() }}
                            </td>
                            <td class="p-4">
                                <a href="{{ route('tickets.show', $ticket) }}"
                                   class="text-blue-600 hover:underline">
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

