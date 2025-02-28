<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\Developer;
use App\Models\Ticket;

class Asignement extends Model
{
    protected $fillable = [
        'ticket_id',
        'developer_id',
        'admin_id'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}
