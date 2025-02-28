<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Asignement;

class Ticket extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'priority',
        'user_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function assignement()
    {
        return $this->hasOne(Asignement::class);
    }
}
