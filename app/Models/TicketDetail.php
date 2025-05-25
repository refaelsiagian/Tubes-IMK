<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketDetail extends Model
{
    public $incrementing = false; 
    protected $primaryKey = null; 

    protected $table = 'ticket_details';
    protected $fillable = [
        'ticket_id', 'item_id', 'item_name', 'item_colour', 'item_size',
        'item_price', 'item_quantity', 'subtotal'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
