<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Item;
use App\Models\Details;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with('category')
            ->withSum('details as total_stock', 'stock')
            ->get();
        $title = 'Semua Barang';

        if (request('search')) {
            $items = $items->filter(function ($item) {
                return str_contains(strtolower($item->name), strtolower(request('search')));
            });
        }

        if (request('category')) {
            $items = $items->filter(function ($item) {
                return $item->category->category_slug == request('category');
            });
            $title = 'Kategori: ' . Category::where('category_slug', request('category'))->first()->category_name;
        }

        if (request('sort')) {
            $sort = request('sort');
            if ($sort == 'name_asc') {
                $items = $items->sortBy('name');
            } elseif ($sort == 'name_desc') {
                $items = $items->sortByDesc('name');
            } elseif ($sort == 'stock_asc') {
                $items = $items->sortBy('total_stock');
            } elseif ($sort == 'stock_desc') {
                $items = $items->sortByDesc('total_stock');
            }
        }

        $categories = Category::all();
        
        return view('dashboard.item.index',[
            'active' => 'item',
            'items' => $items,
            'categories' => $categories,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('dashboard.item.create',[
            'active' => 'item',
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'item_name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'item_description' => 'nullable|string',
            'buying_price' => 'nullable|numeric|min:0',
            'selling_price' => 'nullable|numeric|min:0',
        ]);
        // Check if item name already exists
        $item = Item::where('item_name', $request->item_name)->first();
        if ($item) {
            return redirect()->route('items.index')->with('error', 'Barang sudah ada.');
        }
        // Make the item name always in capital case
        $itemName = ucwords(strtolower($request->item_name));
        $request->merge(['item_name' => $itemName]);
        // Create a slug from the item name
        $slug = str_replace(' ', '-', strtolower($request->item_name));
        $request->merge(['item_slug' => $slug]);
        // Create the item
        Item::create($request->all());
        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource details.
     */
    public function details(string $id)
    {
        return view('dashboard.item.detail', [
            'id' => $id,
            'active' => 'item',
        ]);
    }

    /**
     * Saving the details of the item.
     * This method is called after the details are filled in.
     */
    public function save(string $id)
    {
        return view('dashboard.item.save', [
            'id' => $id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('dashboard.item.show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dashboard.item.edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
