<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    protected $fillable = 
    [ 
        'name',    
    ];


    public function DataInsights()
    {
        return $this->belongsToMany(DataInsight::class,'insight_technologies')->withPivot(['title','rate']);
    }
}
