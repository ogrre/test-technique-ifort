<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'registration_date',
        'status',
        'is_priority',
    ];

    protected $casts = [
        'registration_date' => 'date',
        'is_priority' => 'boolean',
    ];
}
