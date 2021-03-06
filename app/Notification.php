<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'type',
        'notifiable_type',
        'notifiable_id',
        'read_at',
    ];
}
