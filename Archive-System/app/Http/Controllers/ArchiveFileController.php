<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\ArchiveFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchiveFileController extends Controller
{


public function index()
{
    $archives = \App\Models\ArchiveFile::with('event')->latest()->get();
    return view('archives.index', compact('archives'));
}

    public function store(Request $request, Event $event)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png,zip|max:10240'
        ]);

        $path = $request->file('file')->store('archives', 'public');

        ArchiveFile::create([
            'event_id' => $event->id,
            'file_path' => $path,
            'original_name' => $request->file('file')->getClientOriginalName(),
        ]);

        return back();
    }

    public function destroy(ArchiveFile $archiveFile)
    {
        Storage::disk('public')->delete($archiveFile->file_path);
        $archiveFile->delete();

        return back();
    }
}
