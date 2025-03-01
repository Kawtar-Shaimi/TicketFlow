<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Asignement;

class Developer extends User
{
    protected $table = 'users';

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('developer', function ($builder) {
            $builder->where('role', 'developer');
        });
    }

    public function assignements()
    {
        return $this->hasMany(Asignement::class);
    }
}
