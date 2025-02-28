<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Asignement;

class Developer extends User
{
    public function assignements()
    {
        return $this->hasMany(Asignement::class);
    }
}
