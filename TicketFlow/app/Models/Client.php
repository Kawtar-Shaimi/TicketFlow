<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Ticket;

class Client extends User
{
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
