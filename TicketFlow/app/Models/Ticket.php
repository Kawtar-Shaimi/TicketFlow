<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'priority',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
