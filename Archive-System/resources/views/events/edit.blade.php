<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Edit Event</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST" action="{{ route('events.update', $event) }}">
            @csrf
            @method('PUT')

            <input name="title" value="{{ $event->title }}" class="border p-2 w-full mb-2">
            <input name="year" value="{{ $event->year }}" class="border p-2 w-full mb-2">
            <input name="type" value="{{ $event->type }}" class="border p-2 w-full mb-2">

            <button class="bg-blue-500 text-white px-4 py-2">Save</button>
        </form>

        <hr class="my-6">

        <h3 class="font-semibold mb-2">📎 Archive files</h3>

        <form method="POST"
              action="{{ route('archives.store', $event) }}"
              enctype="multipart/form-data"
              class="mb-4">
            @csrf
            <input type="file" name="file" required>
            <button class="bg-green-500 text-white px-3 py-1">Upload</button>
        </form>

        <ul>
            @foreach($event->archives as $file)
                <li class="flex justify-between mb-2">
                    <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank">
                        {{ $file->original_name }}
                    </a>

                    <form method="POST" action="{{ route('archives.destroy', $file) }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
