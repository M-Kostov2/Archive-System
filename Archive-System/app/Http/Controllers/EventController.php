<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::query()
            ->when($request->title, fn($q) =>
                $q->where('title', 'like', '%' . $request->title . '%')
            )
            ->when($request->type, fn($q) =>
                $q->where('type', $request->type)
            )
            ->get();

        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'year'  => 'required|integer',
            'type'  => 'required|string|max:255',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index');
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'year'  => 'required|integer',
            'type'  => 'required|string|max:255',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }
}
