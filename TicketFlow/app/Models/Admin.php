<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Admin extends User
{
    protected $table = 'users';

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('admin', function ($builder) {
            $builder->where('role', 'admin');
        });
    }
    
    public function assignements()
    {
        return $this->hasMany(Asignement::class);
    }
}
