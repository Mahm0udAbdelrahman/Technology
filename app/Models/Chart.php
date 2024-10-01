<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'type',
        'title',
        'text',
        'series',
        'categories',
        'real_time',
        'data_insight_id'

    ];

    protected $casts = [
        'series' => 'array',
        'categories' => 'array',
    ];

    public function dataInsight()
    {
        return $this->belongsTo(DataInsight::class,'data_insight_id','id');
    }
}
