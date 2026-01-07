<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Edit Event</h2>
    </x-slot>

    <div class="p-6 max-w-lg">
        <form method="POST"
              action="{{ route('events.update', $event) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label class="block">Title</label>
                <input type="text"
                       name="title"
                       value="{{ $event->title }}"
                       class="border p-2 w-full"
                       required>
            </div>

            <div class="mb-4">
                <label class="block">Year</label>
                <input type="number"
                       name="year"
                       value="{{ $event->year }}"
                       class="border p-2 w-full"
                       required>
            </div>

            <div class="mb-4">
                <label class="block">Type</label>
                <input type="text"
                       name="type"
                       value="{{ $event->type }}"
                       class="border p-2 w-full"
                       required>
            </div>

            <div class="mb-4">
                <label class="block">Replace file (optional)</label>
                <input type="file" name="file" class="border p-2 w-full">
            </div>

            @if ($event->file_path)
                <div class="mb-4">
                    <p class="text-sm text-gray-600">Current file:</p>
                    <a href="{{ asset('storage/' . $event->file_path) }}"
                       target="_blank"
                       class="text-blue-600 underline">
                        {{ $event->original_name }}
                    </a>
                </div>
            @endif

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Save Changes
            </button>
        </form>
    </div>
</x-app-layout>
