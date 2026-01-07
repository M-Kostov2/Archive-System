<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
    'title',
    'year',
    'type',
    'file_path',
    'file_name',
    'archived',
];


}
