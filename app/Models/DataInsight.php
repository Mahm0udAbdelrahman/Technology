<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataInsight extends Model
{
    use HasFactory;

     
    protected $fillable = 
    [ 
        'name',    
    ];
    public $timestamps = false;
    public function technologies()
    {
        return $this->belongsToMany(Technology::class,'insight_technologies')->withPivot(['title','rate'])->withTimestamps();
    }


    public function charts()
    {
        return $this->hasMany(Chart::class,'data_insight_id','id');
    }
    
}
