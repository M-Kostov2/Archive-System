<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Events</h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('events.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            + Add Event
        </a>

        <form class="mt-4 flex gap-2">
            <input name="title" placeholder="Search title" class="border p-2">
            <input name="type" placeholder="Search type" class="border p-2">
            <button class="bg-gray-500 text-white px-4">Search</button>
        </form>

        <table class="mt-4 w-full border">
            <tr>
                <th>Title</th><th>Year</th><th>Type</th><th>Actions</th>
            </tr>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->year }}</td>
                <td>{{ $event->type }}</td>
                <td>
                    <a href="{{ route('events.edit',$event) }}">Edit</a>
                    <form method="POST" action="{{ route('events.destroy',$event) }}" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
