<x-app-layout>
    <x-slot name="header">
        <h2 class="text-color-black text-xl font-semibold border p-2 w-full ">Add Event</h2>
    </x-slot>

    <div class="p-6 max-w-lg">
        <form method="POST"
              action="{{ route('events.store') }}"
              enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block">Title</label>
                <input type="text" name="title" class="border p-2 w-full" required>
            </div>

            <div class="mb-4">
                <label class="block">Year</label>
                <input type="number" name="year" class="border p-2 w-full" required>
            </div>

            <div class="mb-4">
                <label class="block">Type</label>
                <input type="text" name="type" class="border p-2 w-full" required>
            </div>

            <div class="mb-4">
                <label class="block">Attach file (optional)</label>
                <input type="file" name="file" class="border p-2 w-full">
            </div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Save Even
