<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveFile extends Model
{
    protected $fillable = ['event_id', 'file_path', 'original_name'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}