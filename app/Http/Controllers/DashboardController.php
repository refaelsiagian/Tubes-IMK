<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    /**
     * Display the dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = DB::table('ticket_details')
            ->selectRaw('
                COALESCE(SUM(subprofit), 0) as totalprofit,
                COUNT(DISTINCT ticket_id) as totaltransaksi,
                COALESCE(SUM(item_quantity), 0) as totalquantity
            ')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->first();

        $lowStockDetails = DB::table('details')
            ->join('items', 'details.item_id', '=', 'items.id')
            ->select(
                'details.id as detail_id',
                'details.item_id',
                'details.colour',
                'details.size',
                'details.stock',
                'items.limit_stock',
                'items.item_name'
            )
            ->whereColumn('details.stock', '<', 'items.limit_stock')
            ->get();

        return view('dashboard.index', [
            'active' => 'dashboard',
            'data' => $data,
            'lowstock' => $lowStockDetails->count(),
            'page' => 'Dashboard - Shabrina',
        ]);
    }

    public function chart()
    {
        $profits = Ticket::selectRaw('DATE_FORMAT(ticket_date, "%Y-%m") as month, SUM(total_profit) as total_profit')
            ->where('ticket_date', '>=', Carbon::now()->subMonths(11)->startOfMonth())
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('total_profit', 'month')
            ->toArray();

        // Biar lengkap 12 bulan, bikin data kosong kalau ada bulan yang nggak ada data
        $months = [];
        for ($i = 11; $i >= 0; $i--) {
            $monthKey = Carbon::now()->subMonths($i)->format('Y-m');
            $months[$monthKey] = $profits[$monthKey] ?? 0;
        }

        // Ganti array keys ke format bulan tahun, misal "Desember 2024"
        $categories = [];
        foreach ($months as $monthKey => $profit) {
            $date = Carbon::createFromFormat('Y-m', $monthKey);
            $categories[] = $date->translatedFormat('F Y'); // "December 2024" dalam bahasa sesuai locale
        }

        return response()->json([
            'categories' => $categories,
            'profits' => array_values($months),
        ]);
    }

    public function stock(){

        $lowStockDetails = DB::table('details')
            ->join('items', 'details.item_id', '=', 'items.id')
            ->select(
                'details.id as detail_id',
                'details.item_id',
                'details.colour',
                'details.size',
                'details.stock',
                'items.limit_stock',
                'items.item_name'
            )
            ->whereColumn('details.stock', '<', 'items.limit_stock')
            ->get();

        return view('dashboard.stock', [
            'active' => 'dashboard',
            'lowstock' => $lowStockDetails,
            'page' => 'Stok Hampir Habis - Shabrina',
        ]);
    }
}
