<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'text',
        'series',
        'categories',
        'real_time',
    ];

    protected $casts = [
        'series' => 'array',
        'category' => 'array',
    ];
}
