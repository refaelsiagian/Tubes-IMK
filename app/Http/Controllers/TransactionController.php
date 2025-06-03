<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class TransactionController extends Controller
{
    private function getTransactionData($filterDate)
    {
        $bulanNama = [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
            '04' => 'April', '05' => 'Mei', '06' => 'Juni',
            '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
            '10' => 'Oktober', '11' => 'November', '12' => 'Desember',
        ];

        $tickets = [];
        $ticketDetails = [];
        $totalAmount = 0;
        $totalCost = 0;
        $totalProfit = 0;
        $totalQuantity = 0;
        $monthName = '';

        if ($filterDate) {
            [$year, $month] = explode('-', $filterDate);
            $monthName = $bulanNama[$month] . ' ' . $year;

            $tickets = DB::table('tickets')
                ->whereYear('ticket_date', $year)
                ->whereMonth('ticket_date', $month)
                ->where('status', 1)
                ->get();

            $ticketIds = $tickets->pluck('id')->toArray();

            $ticketDetails = DB::table('ticket_details')
                ->select(
                    'item_name',
                    'item_size',
                    'item_colour',
                    DB::raw('SUM(item_quantity) as total_quantity'),
                    DB::raw('SUM(item_price * item_quantity) as total_subtotal'),
                    DB::raw('SUM(buying_price * item_quantity) as total_submodal'),
                    DB::raw('SUM((item_price * item_quantity) - (buying_price * item_quantity)) as total_subprofit'),
                    DB::raw('MAX(item_price) as item_price'),
                    DB::raw('MAX(buying_price) as buying_price')
                )
                ->whereIn('ticket_id', $ticketIds)
                ->groupBy('item_name', 'item_size', 'item_colour')
                ->get();

            $totalAmount = $tickets->sum('total_amount');
            $totalCost = $tickets->sum('total_cost');
            $totalProfit = $tickets->sum('total_profit');
            $totalQuantity = $ticketDetails->sum('total_quantity');
        }

        return compact('tickets', 'ticketDetails', 'totalAmount', 'totalCost', 'totalProfit', 'totalQuantity', 'monthName');
    }

    public function index()
    {
        $filterDate = request('date') ?? date('Y-m');
        $data = $this->getTransactionData($filterDate);

        return view('dashboard.transaction.index', array_merge($data, [
            'active' => 'transaction',
            'range' => 'annual',
            'dropdown' => $this->getDateDropdown(),
            'selected_date' => $filterDate,
            'page' => 'Laporan Transaksi - Shabrina'
        ]));
    }

    public function print(Request $request)
    {
        $filterDate = $request->date ?? date('Y-m');
        $data = $this->getTransactionData($filterDate);

        $pdf = Pdf::loadView('dashboard.transaction.print', $data);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('Laporan Transaksi Shabrina' . ' ' . $data['monthName'] . '.pdf'); // Bisa ganti jadi ->download() kalau mau langsung download
    }

    private function getDateDropdown()
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

        return $dropdown;
    }

}

