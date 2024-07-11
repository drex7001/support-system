<x-guest-layout>
    <div>
        @if (session('message'))
            <p class="p-2 text-white bg-green-600 rounded dark:bg-green-6 00">{{ session('message') }}</p>
        @endif
        <form action="{{ route('tickets.store') }}" method="POST" class="">
            @csrf
            <section class="block mt-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="customer_name">Customer
                    Name:</label>
                <input
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    type="text" id="customer_name" name="customer_name" required>
            </section>

            <section class="block mt-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                    for="problem_description">Problem Description:</label>
                <textarea
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    ea id="problem_description" name="problem_description" required></textarea>
            </section>

            <section class="block mt-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="email">Email:</label>
                <input
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    type="email" id="email" name="email" required>
            </section>

            <section class="block mt-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="phone">Phone:</label>
                <input
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    type="text" id="phone" name="phone" required>
            </section>

            <section class="flex justify-end mt-4">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 ms-3">Submit</button>
            </section>
        </form>

    </div>
</x-guest-layout>
