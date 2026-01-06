<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'year', 'type'];

    public function archives()
    {
        return $this->hasMany(ArchiveFile::class);
    }
}
