<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{

    public function index()
    {
        $bulanNama = [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
            '04' => 'April', '05' => 'Mei', '06' => 'Juni',
            '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
            '10' => 'Oktober', '11' => 'November', '12' => 'Desember',
        ];

        $tahunMulai = 2023;
        $tahunSekarang = date('Y');
        $bulanSekarang = date('m');

        $dropdown = [];
        for ($tahun = $tahunSekarang; $tahun >= $tahunMulai; $tahun--) {
            $maxBulan = ($tahun == $tahunSekarang) ? $bulanSekarang : 12;
            for ($bulan = $maxBulan; $bulan >= 1; $bulan--) {
                $bulanFormatted = str_pad($bulan, 2, '0', STR_PAD_LEFT);
                $dropdown[] = [
                    'value' => $tahun . '-' . $bulanFormatted,
                    'label' => $bulanNama[$bulanFormatted] . ' ' . $tahun
                ];
            }
        }

        $filterDate = request('date'); // contoh: "2023-01"
        $tickets = [];
        $ticketDetails = [];
        $totalAmount = 0;
        $totalCost = 0;
        $totalProfit = 0;
        $totalQuantity = 0;

        if ($filterDate) {
            [$year, $month] = explode('-', $filterDate);

            // Ambil tiket berdasarkan bulan dan tahun
            $tickets = DB::table('tickets')
                ->whereYear('ticket_date', $year)
                ->whereMonth('ticket_date', $month)
                ->where('status', 1)
                ->get();

            $ticketIds = $tickets->pluck('id')->toArray();

            // Ambil detail tiket berdasarkan ticket_id
            $ticketDetails = DB::table('ticket_details')
                ->whereIn('ticket_id', $ticketIds)
                ->get();

            // Hitung total
            $totalAmount = $tickets->sum('total_amount');
            $totalCost = $tickets->sum('total_cost');
            $totalProfit = $tickets->sum('total_profit');
            $totalQuantity = $ticketDetails->sum('item_quantity');
        }

        return view('dashboard.transaction.index', [
            'active' => 'transaction',
            'range' => 'annual',
            'dropdown' => $dropdown,
            'selected_date' => $filterDate,
            'tickets' => $tickets,
            'ticket_details' => $ticketDetails,
            'total_quantity' => $totalQuantity,
            'total_amount' => $totalAmount,
            'total_cost' => $totalCost,
            'total_profit' => $totalProfit,
        ]);
    }


}
