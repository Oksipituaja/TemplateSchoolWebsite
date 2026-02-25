<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'student_name',
        'email',
        'phone',
        'birth_date',
        'current_school',
        'address',
        'guardian_name',
        'guardian_phone',
        'status',
        'notes',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];
}
