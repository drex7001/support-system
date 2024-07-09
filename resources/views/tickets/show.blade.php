<x-app-layout>
    <div
        class="container mx-auto p-4 w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        @if (session('message'))
            <p class="text-white dark:bg-green-6    00 bg-green-600 rounded p-2">{{ session('message') }}</p>
        @endif
        <div class="rounded p-6">
            <h2 class="text-2xl font-semibold mb-4 block text-gray-700 dark:text-white">Ticket Details</h2>
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-400">Customer Name:</label>
                <p class="block font-medium text-sm text-gray-700 dark:text-gray-200 ml-2">{{ $ticket->customer_name }}
                </p>
            </div>
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-400">Problem Description:</label>
                <p class="block font-medium text-sm text-gray-700 dark:text-gray-200 ml-2">
                    {{ $ticket->problem_description }}</p>
            </div>
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-400">Email:</label>
                <p class="block font-medium text-sm text-gray-700 dark:text-gray-200 ml-2">{{ $ticket->email }}</p>
            </div>
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-400">Phone:</label>
                <p class="block font-medium text-sm text-gray-700 dark:text-gray-200 ml-2">{{ $ticket->phone }}</p>
            </div>
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-400">Status:</label>
                <p class="block font-medium text-sm text-gray-700 dark:text-gray-200 ml-2">
                    {{ ucfirst($ticket->status) }}</p>
            </div>
            @if ($ticket->replies->count() > 0)
                <div class="mb-4">
                    <h3 class="text-2xl font-semibold mb-4 block text-gray-700 dark:text-white">Replies</h3>
                    <ul class="overflow-y-scroll">
                        @foreach ($ticket->replies as $reply)
                            <li class="bg-gray-100 p-3 rounded mb-2">
                                <p>{{ $reply->message }}</p>
                                <p class="text-sm text-gray-500 flex justify-end">Replied on
                                    {{ $reply->created_at->format('M d, Y H:i') }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="rounded  mt-6">
                <h2 class="text-2xl font-semibold mb-4 block text-gray-700 dark:text-white">Reply to Ticket</h2>
                <form action="/tickets/{{ $ticket->id }}/reply" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="message"
                            class="block font-medium text-sm text-gray-700 dark:text-gray-300">Message:</label>
                        <textarea id="message" name="message" rows="4"
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                            required></textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-3">Send
                        Reply</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
