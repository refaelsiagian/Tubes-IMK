<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Item;
use App\Models\Detail;
use App\Models\TicketDetail;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TicketController extends Controller
{
public function index(Request $request)
{
    $ticket = null;
    $ticketDetails = collect();
    $totalQuantity = 0;
    $totalPrice = 0;
    $active = $request->active ?? 'ticket';

    // Ambil tiket dengan status 0 (belum selesai)
    $ticket = Ticket::with('ticket_details.item')
        ->where('status', 0)
        ->first();

    if ($ticket) {
        $ticketDetails = $ticket->ticket_details;

        $totalQuantity = $ticketDetails->sum('item_quantity');

        $totalPrice = $ticketDetails->sum(function ($detail) {
            return ($detail->item_price ?? 0) * ($detail->item_quantity ?? 0);
        });
    }

    return view('admin.index', [
        'ticket' => $ticket,
        'ticketDetails' => $ticketDetails,
        'totalQuantity' => $totalQuantity,
        'totalPrice' => $totalPrice,
        'active' => $active
    ]);
}



    function add(Request $request)
    {
        $currentTicket = Ticket::where('status', 0)->first();

        if(!$currentTicket){
            return redirect()->route('tickets.index');
        }

        $allItems = Item::all();

        $details = \DB::table('details')
            ->select('item_id', 'colour', 'size')
            ->get()
            ->groupBy('item_id');

        $ticket = Ticket::latest()->where('status', 0)->first();

        $totals = TicketDetail::where('ticket_id', $ticket?->id)
            ->selectRaw('SUM(item_quantity) as total_quantity, SUM(subtotal) as total_price')
            ->first();

        return view('admin.add', [
            'items' => $allItems,
            'details' => $details,
            'ticket' => $ticket,
            'totalQuantity' => $totals->total_quantity ?? 0,
            'totalPrice' => $totals->total_price ?? 0,
            'active' => 'ticket',
        ]);
    }

    function store(Request $request)
    {
        $lastTicket = Ticket::orderBy('id', 'desc')->first();
        $lastNumber = 0;
        if ($lastTicket) {
            $lastNumber = intval(substr($lastTicket->id, 2));
        }
        $newNumber = 'SH' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

        $ticket = Ticket::create([
            'id' => $newNumber,
            'admin_id' => auth()->user()->id,
            'ticket_date' => now(),
            'total_amount' => 0,
            'status' => 0,
        ]);

    return redirect()->route('tickets.index');
    }

    public function confirm($id)
    {
        $ticket = Ticket::with('ticket_details')->findOrFail($id);

        // Cek apakah ada item di dalam transaksi
        if ($ticket->ticket_details->isEmpty()) {
            return back()->with('error', 'Tidak bisa konfirmasi. Belum ada barang di transaksi.');
        }

        // Hitung total harga
        $totalPrice = $ticket->ticket_details->sum(function ($detail) {
            return ($detail->item_price ?? 0) * ($detail->item_quantity ?? 0);
        });

        // Kurangi stok
        foreach ($ticket->ticket_details as $detail) {
            $stokDetail = \DB::table('details')
                ->where('item_id', $detail->item_id)
                ->where('colour', $detail->item_colour)
                ->where('size', $detail->item_size)
                ->first();

            if ($stokDetail && $stokDetail->stock >= $detail->item_quantity) {
                \DB::table('details')
                    ->where('item_id', $detail->item_id)
                    ->where('colour', $detail->item_colour)
                    ->where('size', $detail->item_size)
                    ->decrement('stock', $detail->item_quantity);
            } else {
                return back()->with('error', 'Stok tidak cukup untuk item: ' . $detail->item_name);
            }
        }

        // Update status dan total_amount
        $ticket->update([
            'status' => 1,
            'total_amount' => $totalPrice,
        ]);

        return redirect()->route('tickets.index')->with('success', 'Transaksi dikonfirmasi dan stok dikurangi.');
    }


    public function cancel($id)
    {
        Ticket::where('id', $id)->delete();
        return redirect()->route('tickets.index')->with('success', 'Transaksi berhasil dibatalkan.');
    }

   public function addItem(Request $request)
    {
        $validated = $request->validate([
            'ticket_id' => 'required',
            'item_id' => 'required',
            'item_name' => 'required',
            'item_colour' => 'nullable',
            'item_size' => 'nullable',
            'item_price' => 'required|numeric',
            'item_quantity' => 'required|integer|min:1',
        ]);

        // Ambil buying_price dari item sekali saja
        $item = Item::find($validated['item_id']);
        $buyingPrice = $item ? $item->buying_price : 0;

        $subtotal = $validated['item_price'] * $validated['item_quantity'];
        $subcost = $buyingPrice * $validated['item_quantity'];
        $subprofit = $subtotal - $subcost;

        // Cari data existing
        $existing = TicketDetail::where('ticket_id', $validated['ticket_id'])
            ->where('item_id', $validated['item_id'])
            ->where('item_colour', $validated['item_colour'])
            ->where('item_size', $validated['item_size'])
            ->where('item_price', $validated['item_price'])
            ->first();

        if ($existing) {
            // Tambahkan jumlah baru
            $existing->item_quantity += $validated['item_quantity'];
            $existing->subtotal = $existing->item_price * $existing->item_quantity;
            $existing->subcost = $buyingPrice * $existing->item_quantity;
            $existing->subprofit = $existing->subtotal - $existing->subcost;
            $existing->save();
        } else {
            TicketDetail::create([
                'ticket_id' => $validated['ticket_id'],
                'item_id' => $validated['item_id'],
                'item_name' => $validated['item_name'],
                'item_colour' => $validated['item_colour'],
                'item_size' => $validated['item_size'],
                'item_price' => $validated['item_price'],
                'buying_price' => $buyingPrice,
                'item_quantity' => $validated['item_quantity'],
                'subtotal' => $subtotal,
                'subcost' => $subcost,
                'subprofit' => $subprofit,
            ]);
        }

        return redirect()->route('tickets.add')->with('success', 'Item berhasil ditambahkan.');
    }


    public function destroyItem($ticket_id, $item_id, $id)
    {
        // Hapus satu item dari suatu transaksi
        TicketDetail::where('id', $id)->where('ticket_id', $ticket_id)->where('item_id', $item_id)->delete();

        return redirect()->back()->with('success', 'Item berhasil dihapus dari transaksi.');
}


    function update(Request $request, $id)
    {
        // Validate and update the ticket data
        // Redirect or return a response
    }

    function destroy(Request $request, $id)
    {
        // Validate and update the ticket data
        // Redirect or return a response
    }
}