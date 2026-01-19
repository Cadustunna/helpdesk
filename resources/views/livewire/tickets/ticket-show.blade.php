    <div class="max-w-4xl mx-auto p-6 space-y-6">
        <div class="space-y-4">
            @foreach ($messages as $msg)
                <div class="rounded-lg border p-4
                    {{ $msg->user->is_admin ? 'bg-gray-50' : 'bg-blue-50' }}">

                    <div class="flex justify-between items-center mb-1">
                        <span class="font-semibold text-sm">
                            {{ $msg->user->name }}
                            @if($msg->user->is_admin)
                                <span class="text-xs text-gray-500">(Admin)</span>
                            @endif
                        </span>
                        <span class="text-xs text-gray-500">
                            {{ $msg->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <p class="text-gray-700">
                        {{ $msg->message }}
                    </p>
                </div>
            @endforeach
        </div>

        <!-- Reply box -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="mb-4 font-semibold">Reply</h2>
            <textarea
                    wire:model.defer="message"
                    rows="4"
                    class="w-full rounded-md border px-3 py-2"></textarea>

            <div class="mt-4 flex justify-end">
                <button
                    wire:click="sendMessage"
                    class="rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                    Send Reply
                </button>
            </div>
        </div>
    </div>
