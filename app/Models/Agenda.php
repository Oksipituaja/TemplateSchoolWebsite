<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'event_date',
        'location',
        'status',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];
}
