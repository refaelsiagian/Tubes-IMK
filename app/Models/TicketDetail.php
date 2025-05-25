<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\Ticket;

class TicketDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'ticket_id');
    }
}
