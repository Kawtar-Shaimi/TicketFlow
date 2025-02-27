<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PhpParser\Node\Expr\Assign;
use PHPUnit\Framework\Attributes\Ticket;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token'
    ];

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
