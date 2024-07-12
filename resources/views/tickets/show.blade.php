<x-customer-layout>
    <div
        class="container w-full mx-auto mt-6 overflow-hidden bg-white shadow-md md:p-4 sm:max-w-2xl dark:bg-gray-800 sm:rounded-lg">
        @if (session('message'))
            <p class="p-2 mb-2 text-white bg-green-600 rounded dark:bg-green-6">{{ session('message') }}</p>
        @endif
        <div class="w-full rounded">
            <h2 class="block mb-4 text-2xl font-semibold text-gray-700 dark:text-white">Ticket Details</h2>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Customer Name:</label>
                <p class="block ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">{{ $ticket->customer_name }}
                </p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Problem Description:</label>
                <p class="block ml-2 font-medium text-gray-700 text-sm/relaxed dark:text-gray-300">
                    {{ $ticket->problem_description }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Email:</label>
                <p class="block ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">{{ $ticket->email }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Phone:</label>
                <p class="block ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">{{ $ticket->phone }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Status:</label>
                <p class="block ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ ucfirst($ticket->status) }}</p>
            </div>
            @if ($ticket->replies->count() > 0)
                <div class="mb-4">
                    <h3 class="block mb-4 text-2xl font-semibold text-gray-700 dark:text-white">Replies</h3>
                    <ul class="overflow-y-scroll h-96 ">
                        @foreach ($ticket->replies as $reply)
                            <li class="p-3 mb-2 bg-gray-700 border border-gray-600 rounded">
                                <p class="text-gray-100 dark:">{{ $reply->message }}</p>
                                <p class="flex justify-end text-xs dark:text-gray-300">Replied on
                                    {{ $reply->created_at->format('M d, Y H:i') }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Auth::check())
                <div class="mt-6 rounded">
                    <h2 class="block mb-4 text-2xl font-semibold text-gray-700 dark:text-white">Reply to Ticket</h2>
                    <form action="/tickets/{{ $ticket->id }}/reply" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="message"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message:</label>
                            <textarea id="message" name="message" rows="4"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                required></textarea>
                            @error('message')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-300 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 ms-3">Send
                            Reply</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-customer-layout>
