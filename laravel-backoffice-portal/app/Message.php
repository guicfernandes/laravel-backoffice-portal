<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'id',
        'subject',
        'content',
        'start_date',
        'expiration_date',
        'change_event_date',
        'active',
        'employee_id'
    ];
}
