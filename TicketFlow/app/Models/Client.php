<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Ticket;

class Client extends User
{
    protected $table = 'users';

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('client', function ($builder) {
            $builder->where('role', 'client');
        });
    }
    
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
