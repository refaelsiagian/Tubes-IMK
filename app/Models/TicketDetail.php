<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\Ticket;

class TicketDetail extends Model
{
    public $incrementing = false; 
    protected $primaryKey = null; 

    protected $table = 'ticket_details';
    protected $fillable = [
        'ticket_id', 'item_id', 'item_name', 'item_colour', 'item_size',
        'item_price', 'item_quantity', 'subtotal'
    ];

    protected $guarded = ['id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'id');
    }
}
