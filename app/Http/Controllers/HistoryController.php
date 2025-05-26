<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Carbon; 

class HistoryController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $tickets = Ticket::with(['ticket_details.item'])
                        ->whereDate('created_at', $today)
                        ->where('status', 1) // Hanya ambil tiket yang sudah selesai
                        ->get();

        $riwayat = $today->translatedFormat('d F Y');

        return view('admin.history', [
            'title' => 'History',
            'active' => 'history',
            'tickets' => $tickets,
            'riwayat' => $riwayat,
        ]);
    }
}