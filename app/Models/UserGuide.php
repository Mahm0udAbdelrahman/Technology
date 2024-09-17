<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGuide extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'sup_menu_id',
    ];


    public function children()
    {
        return $this->hasMany(UserGuide::class, 'sup_menu_id');
    }

    public function parent()
    {
        return $this->belongsTo(UserGuide::class, 'sup_menu_id');
    }
}
