<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $incrementing = false;

    protected $keyType = 'string';

    public function ticket_details()
    {
        return $this->hasMany(TicketDetail::class, 'ticket_id', 'id');
    }
}
