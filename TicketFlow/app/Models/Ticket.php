<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Asignement;

class Ticket extends Model
{
    protected $fillable = [
        'title',
        'description',
        'os',
        'software',
        'status',
        'priority',
        'client_id'
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
