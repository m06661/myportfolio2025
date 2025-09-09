<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="text-center mt-5">
            <h1 class="text-3xl font-bold">Welcome to My Portfolio</h1>
            <p class="text-lg text-gray-600 mt-2">Showcasing my latest work and projects. Explore and enjoy!</p>
        </div>

        {{-- Latest Projects Section --}}
        <div class="mt-10">
            <h2 class="text-2xl font-semibold text-center mb-6">Latest Projects</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse ($latestProjects as $project)
                    <div class="bg-white rounded-xl shadow-md p-6 flex flex-col justify-between">
                        <div>
                            <h5 class="text-xl font-bold">{{ $project->title }}</h5>
                            <p class="text-gray-600 mt-2">{{ Str::limit($project->description, 100) }}</p>
                        </div>

                        @if ($project->link)
                            <a href="{{ $project->link }}"
                               class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition"
                               target="_blank">
                                View Project
                            </a>
                        @endif
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500">No recent projects available.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
