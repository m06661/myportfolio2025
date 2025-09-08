<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Home') }}
            </h2>

            {{-- Dark Mode Toggle --}}
            <button id="dark-mode-toggle" class="px-3 py-1 rounded-md bg-indigo-600 text-white hover:bg-indigo-700 transition focus:outline-none">
                Toggle Dark Mode
            </button>
        </div>
    </x-slot>

    <div class="py-12 min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Welcome Section --}}
            <div class="text-center mt-5 mb-12">
                <h1 class="text-5xl font-extrabold text-gray-900 dark:text-white drop-shadow-md">
                    Welcome to My Portfolio
                </h1>
                <p class="mt-4 text-xl text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                    Showcasing my latest work and projects. Explore and enjoy!
                </p>
            </div>

            {{-- Latest Projects --}}
            <div>
                <h2 class="text-3xl font-bold text-center mb-10 text-gray-900 dark:text-white">
                    Latest Projects
                </h2>

                @if ($latestProjects->isEmpty())
                    <p class="text-center text-gray-600 dark:text-gray-400">No recent projects available.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($latestProjects as $project)
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 flex flex-col justify-between transition-transform hover:scale-105 duration-300">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $project->title }}</h3>
                                    <p class="text-gray-600 dark:text-gray-300">{{ Str::limit($project->description, 100) }}</p>
                                </div>
                                @if ($project->link)
                                    <a href="{{ $project->link }}" target="_blank"
                                       class="mt-4 inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md font-semibold transition">
                                        View Project
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Dark Mode Script --}}
    <script>
        const toggleBtn = document.getElementById('dark-mode-toggle');
        const htmlElement = document.documentElement;

        // Start with dark mode off:
        htmlElement.classList.remove('dark');

        toggleBtn.addEventListener('click', () => {
            htmlElement.classList.toggle('dark');
        });
    </script>

    {{-- Optional fade-in animation style --}}
    <style>
        [x-cloak] { display: none !important; }
    </style>
</x-app-layout>
