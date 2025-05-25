<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['id', 'ticket_date', 'total_amount', 'status'];

    public $incrementing = false; // Karena kamu pakai custom ID string

    public function ticket_details()
    {
        return $this->hasMany(TicketDetail::class, 'ticket_id', 'id');
    }

    public function getTotalQuantity()
    {
        return $this->ticket_details->sum('item_quantity');
    }

    public function getTotalPrice()
    {
        return $this->ticket_details->sum(function ($detail) {
            return ($detail->item_price ?? 0) * ($detail->item_quantity ?? 0);
        });
    }

    public static function generateNewId()
    {
        $lastTicket = self::orderBy('id', 'desc')->first();
        $lastNumber = 0;
        if ($lastTicket) {
            $lastNumber = intval(substr($lastTicket->id, 2));
        }
        return 'SH' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    }
}
