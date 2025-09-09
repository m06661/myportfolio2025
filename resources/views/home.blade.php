<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Hero Section --}}
            <div class="bg-white rounded-lg shadow-md p-10 text-center mb-12">
                <h1 class="text-4xl font-extrabold text-gray-900">Welcome to My Portfolio</h1>
                <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                    Discover the projects I've worked on as a developer. From creative ideas to real-world solutions.
                </p>
                <a href="{{ route('projects.index') }}"
                   class="mt-6 inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold shadow hover:bg-indigo-700 transition">
                    View All Projects
                </a>
            </div>

            {{-- Latest Projects Section --}}
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Latest Projects</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($latestProjects as $project)
                        <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 flex flex-col justify-between">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">{{ $project->name }}</h3>
                                <p class="text-gray-600 mt-2">{{ Str::limit($project->description, 120) }}</p>
                            </div>

                            @if ($project->link)
                                <a href="{{ $project->link }}" target="_blank"
                                   class="mt-4 inline-block text-indigo-600 hover:text-indigo-800 font-medium transition">
                                    View Project →
                                </a>
                            @endif
                        </div>
                    @empty
                        <div class="col-span-3 text-center text-gray-500">
                            No recent projects available.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
