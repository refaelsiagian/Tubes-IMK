<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Ticket;

class InfoController extends Controller
{
    public function index()
    {
        $tanggal = Carbon::today()->toDateString();

        $itemSales = DB::table('ticket_details')
            ->join('items', 'ticket_details.item_id', '=', 'items.id')
            ->join('tickets', 'ticket_details.ticket_id', '=', 'tickets.id')
            ->select(
             'items.item_name as nama_barang',
                DB::raw('SUM(ticket_details.item_quantity) as barang_terjual'),
                DB::raw('COUNT(ticket_details.item_id) as banyak_transaksi'),
                DB::raw('SUM(ticket_details.item_price * ticket_details.item_quantity) as penghasilan'),
                DB::raw('
                    CASE 
                        WHEN COUNT(ticket_details.item_id) > 0 
                        THEN SUM(ticket_details.item_price * ticket_details.item_quantity) / COUNT(ticket_details.item_id) 
                        ELSE 0
                    END as rata_rata_transaksi
                ')
            )
            ->whereDate('tickets.created_at', $tanggal) 
            ->groupBy('items.item_name')
            ->get();


        $totalIncome = $itemSales->sum('penghasilan');
        $transactionCount = Ticket::whereDate('created_at', $tanggal)->count();
        $avgTransaction = $transactionCount > 0 ? $totalIncome / $transactionCount : 0;
        $totalItemSold = $itemSales->sum('barang_terjual');

        return view('admin.info', [
            'active' => 'info',
            'tanggal' => $tanggal,
            'totalIncome' => $totalIncome,
            'transactionCount' => $transactionCount,
            'avgTransaction' => $avgTransaction,
            'totalItemSold' => $totalItemSold,
            'itemSales' => $itemSales,
            'page' => 'Info - Shabrina'
        ]);
    }
}
