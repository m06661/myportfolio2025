<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h1 class="text-2xl font-bold mb-6 text-white dark:text-white">Neem contact met ons op</h1>

                @if (session('success'))
                    <div id="success-message" class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>

                    <script>
                        setTimeout(() => {
                            document.getElementById('success-message').style.display = 'none';
                        }, 3000);
                    </script>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="naam" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Naam</label>
                        <input type="text" name="naam" id="naam" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 bg-white text-black">
                    </div>


                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" name="email" id="email" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 bg-white text-black">
                    </div>

                    <div>
                        <label for="onderwerp" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Onderwerp</label>
                        <input type="text" name="onderwerp" id="onderwerp" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 bg-white text-black">
                    </div>

                    <div>
                        <label for="bericht" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bericht</label>
                        <textarea name="bericht" id="bericht" rows="5" required
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 bg-white text-black"></textarea>
                    </div>

                    <div>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 border border-transparent rounded-md font-semibold text-white focus:outline-none focus:ring focus:ring-indigo-300 transition">
                            Verzenden
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
