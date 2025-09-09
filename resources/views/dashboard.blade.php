<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- ✅ Add Project Form --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Add New Project</h3>

                <form action="{{ route('projects.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Project Name</label>
                        <input type="text" name="name" id="name" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" required
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    </div>
                    <div>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            ➕ Add Project
                        </button>
                    </div>
                </form>
            </div>

            {{-- ✅ Projects Table --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Your Projects</h3>

                @if($projects->isEmpty())
                    <p class="text-gray-500">No projects found.</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($projects as $project)
                            <tr>
                                {{-- Update Form --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('projects.update', $project) }}" method="POST" class="flex flex-col space-y-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="name" value="{{ $project->name }}"
                                               class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                        <textarea name="description"
                                                  class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ $project->description }}</textarea>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                    <button type="submit"
                                            class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                                        Update
                                    </button>
                                    </form>

                                    {{-- Delete Form --}}
                                    <form action="{{ route('projects.destroy', $project) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700"
                                                onclick="return confirm('Type project name to confirm deletion.')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
