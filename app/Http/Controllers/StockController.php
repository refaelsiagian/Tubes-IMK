<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function getStock(Request $request)
    {
        $itemId = $request->input('item_id');
        $colour = $request->input('colour');
        $size = $request->input('size');

        $query = \DB::table('details')
            ->where('item_id', $itemId);

        if (!is_null($colour)) {
            $query->where('colour', $colour);
        }

        if (!is_null($size)) {
            $query->where('size', $size);
        }

        $detail = $query->first();

        return response()->json([
            'stock' => $detail?->stock ?? 0,
        ]);
    }

}
