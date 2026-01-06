<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">All Archive Files</h2>
    </x-slot>

    <div class="p-6">
        <table class="w-full border">
            <tr>
                <th>Event</th>
                <th>File</th>
                <th>Uploaded At</th>
                <th>Action</th>
            </tr>
            @foreach($archives as $file)
            <tr>
                <td>{{ $file->event->title }}</td>
                <td>
                    <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank">
                        {{ $file->original_name }}
                    </a>
                </td>
                <td>{{ $file->created_at }}</td>
                <td>
                    <form method="POST" action="{{ route('archives.destroy', $file) }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
