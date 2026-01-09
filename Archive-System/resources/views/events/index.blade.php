<x-app-layout>
    <x-slot name="header">
        <h2 class="text-black text-xl font-semibold">
            Events
        </h2>
    </x-slot>

    <div class="p-6">
        <!-- Add Event Button -->
        <a href="{{ route('events.create') }}"
           class="bg-blue-500 text-black px-4 py-2 rounded inline-block mb-4">
            + Add Event
        </a>

        <!-- Search Form -->
        <form method="GET"
              action="{{ route('events.index') }}"
              class="flex gap-2 mb-4">

            <input type="text"
                   name="title"
                   value="{{ request('title') }}"
                   placeholder="Search title"
                   class="border border-gray-400 p-2">

            <input type="text"
                   name="type"
                   value="{{ request('type') }}"
                   placeholder="Search type"
                   class="border border-gray-400 p-2">

            <button type="submit"
                    class="bg-gray-600 text-black px-4 py-2">
                Search
            </button>
        </form>

        <!-- Events Table -->
        <table class="w-full border border-black border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-black p-2 text-left">Title</th>
                    <th class="border border-black p-2 text-left">Year</th>
                    <th class="border border-black p-2 text-left">Type</th>
                    <th class="border border-black p-2 text-left">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($events as $event)
                    <tr>
                        <td class="border border-black p-2">
                            {{ $event->title }}
                        </td>
                        <td class="border border-black p-2">
                            {{ $event->year }}
                        </td>
                        <td class="border border-black p-2">
                            {{ $event->type }}
                        </td>
                        <td class="border border-black p-2 space-x-2">
                            <a href="{{ route('events.edit', $event) }}"
                               class="text-blue-600 underline">
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('events.destroy', $event) }}"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 underline"
                                        onclick="return confirm('Delete this event?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border border-black p-4 text-center">
                            No events found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
