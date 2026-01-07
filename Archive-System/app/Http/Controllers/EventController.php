<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

 public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'year' => 'required',
        'type' => 'required',
        'file' => 'nullable|file|max:10240',
    ]);

    $data = $request->only('title', 'year', 'type');

    if ($request->hasFile('file')) {
        $path = $request->file('file')->store('events', 'public');
        $data['file_path'] = $path;
        $data['file_name'] = $request->file('file')->getClientOriginalName();
    }

    Event::create($data);

    return redirect()->route('events.index');
}

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

   public function update(Request $request, Event $event)
{
    $request->validate([
        'title' => 'required',
        'year' => 'required',
        'type' => 'required',
        'file' => 'nullable|file|max:10240',
    ]);

    $data = $request->only('title', 'year', 'type');

    if ($request->hasFile('file')) {
        $path = $request->file('file')->store('events', 'public');
        $data['file_path'] = $path;
        $data['file_name'] = $request->file('file')->getClientOriginalName();
    }

    $event->update($data);

    return redirect()->route('events.index');
}


    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }
}

