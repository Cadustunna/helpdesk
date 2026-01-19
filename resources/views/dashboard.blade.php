<x-app-layout>
    <div class="p-6 space-y-6">

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-4 rounded shadow">
                <p class="text-sm text-gray-500">Open Tickets</p>
                <p class="text-2xl font-bold">{{ $openTickets }}</p>
            </div>

            <div class="bg-white p-4 rounded shadow">
                <p class="text-sm text-gray-500">In Progress</p>
                <p class="text-2xl font-bold">{{ $inProgressTickets }}</p>
            </div>

            <div class="bg-white p-4 rounded shadow">
                <p class="text-sm text-gray-500">Resolved</p>
                <p class="text-2xl font-bold">{{ $resolvedTickets }}</p>
            </div>

            <div class="bg-white p-4 rounded shadow">
                <p class="text-sm text-gray-500">My Tickets</p>
                <p class="text-2xl font-bold">{{ $tickets->count()}}</p>
            </div>
        </div>

        <!-- Recent Tickets -->
        <div class="bg-white rounded shadow">
            <div class="p-4 border-b font-semibold">
                Recent Tickets
            </div>

            <table class="w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">S/N</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Created</th>
                    </tr>
                </thead>

                @php
                    $i = 0;
                @endphp

                @foreach ( $tickets as $ticket )
                @php
                    $i++;
                @endphp
                <tbody>
                    <tr class="border-t w-full text-center">
                            <td class="text-start p-3">{{ $i }}</td>
                            <td>{{ $ticket->title }}</td>
                            <td>{{ $ticket->category }}</td>
                            <td>{{ $ticket->priority }}</td>
                            <td>{{ $ticket->status }}</td>
                            <td>{{ $ticket->created_at }}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>

    </div>
</x-app-layout>
