<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignement extends Model
{
    protected $fillable = [
        'ticket_id',
        'user_id',
        'asignement_date'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
