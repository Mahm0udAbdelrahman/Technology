<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['name','email', 'message'];
}
Broadcast::channel('notificationChannel', function ($user) {
    return ['id' => $user->id, 'name' => $user->name];
});