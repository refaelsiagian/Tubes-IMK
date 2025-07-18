<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Item;
use App\Models\Detail;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;


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
            'page' => 'Barang - Shabrina'
        ]);
    }

    /**
     * Withdraw an item.
     */
    public function withdraw(string $id){
        //mengubah status item menjadi 0 (withdrawn)
        $item = Item::findOrFail($id);
        $item->item_status = 0; // Set status ke withdrawn
        $item->save();
        return redirect()->route('items.index')->with('success', 'Item berhasil ditarik.');
    }


    /**
     * Restore an item.
     */
    public function restore(string $id)
    {
        $item = Item::findOrFail($id);

        if (!$item->hasValidImages()) {
            return redirect()->back()->with('error', 'Gambar item belum lengkap. Minimal 2 gambar umum dan 1 gambar per warna.');
        }

        $item->item_status = 1;
        $item->save();

        return redirect()->route('items.index')->with('success', 'Item berhasil ditampilkan.');

        // Jika semua validasi lolos, aktifkan item
        $item->item_status = 1;
        $item->save();

        return redirect()->route('items.index')->with('success', 'Item berhasil ditampilkan.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::with(['category', 'details', 'images'])->findOrFail($id);

        // Ambil semua warna unik dari gambar yang punya warna
        $colours = $item->images->whereNotNull('colour')->pluck('colour')->unique()->values();

        // Ambil semua kombinasi size + colour dari detail
        $details = $item->details;

        // Gambar umum dan per warna
        $image_general = $item->images->whereNull('colour');
        $image_colour = $item->images->whereNotNull('colour');

        // Data tambahan yang dulu dipakai di edit
        $categories = Category::all();
        $sizes = Detail::where('item_id', $id)->pluck('size')->unique()->values();
        $coloursFromDetail = Detail::where('item_id', $id)->pluck('colour')->unique()->values();

        return view('dashboard.item.show', [
            'id' => $id,
            'item' => $item,
            'categories' => $categories,
            'details' => $details,
            'colours' => $colours,
            'image_general' => $image_general,
            'image_colour' => $image_colour,
            'sizes' => $sizes,
            'coloursFromDetail' => $coloursFromDetail,
            'active' => 'item',
            'page' => 'Lihat Barang - Shabrina'
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dashboard.item.edit', [
            'id' => $id,
            'active' => 'item',
            'categories' => Category::all(),
            'item' => Item::findOrFail($id),
            'sizes' => Detail::where('item_id', $id)->pluck('size')->unique()->values(),
            'colours' => Detail::where('item_id', $id)->pluck('colour')->unique()->values(),
            'page' => 'Edit Data Barang - Shabrina'
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $item = Item::findOrFail($id);

            // Cek validasi input
            $request->validate([
                'item_name' => 'required|max:255|unique:items,item_name,' . $item->id,
                'category_id' => 'required|exists:categories,id',
                'size' => 'nullable|array',
                'colour' => 'nullable|array',
                'item_description' => 'nullable|string',
                'buying_price' => 'nullable|numeric|min:0',
                'selling_price' => 'nullable|numeric|min:0',
            ]);

            // Update data utama
            $item->item_name = $request->item_name;
            $item->item_slug = str_replace(' ', '-', strtolower($request->item_name));
            $item->category_id = $request->category_id;
            $item->item_description = $request->item_description;
            $item->buying_price = $request->buying_price;
            $item->selling_price = $request->selling_price;
            $item->save();

            // Ambil input size & colour (bisa null kalau nggak ada)
            $sizes = $request->size ?? [];
            $colours = $request->colour ?? [];

            // Konversi ke array unik (biar nggak ada duplikat)
            $sizes = array_unique(array_filter($sizes));
            $colours = array_unique(array_filter($colours));

            // Data kombinasi baru yang akan dibentuk
            $newCombinations = [];

            if (count($sizes) == 0 && count($colours) == 0) {
                // Tidak ada size & colour -> Buat default kosong
                $newCombinations[] = ['size' => null, 'colour' => null];
            } else {
                // Ada size/colour -> Buat kombinasi
                if (count($sizes) == 0) $sizes = [null];
                if (count($colours) == 0) $colours = [null];

                foreach ($sizes as $size) {
                    foreach ($colours as $colour) {
                        $newCombinations[] = ['size' => $size, 'colour' => $colour];
                    }
                }
            }

            // Ambil kombinasi lama
            $oldDetails = Detail::where('item_id', $item->id)->get();
            $oldKeys = $oldDetails->map(function ($d) {
                return $d->size . '|' . $d->colour;
            })->toArray();

            $newKeys = array_map(function ($c) {
                return $c['size'] . '|' . $c['colour'];
            }, $newCombinations);

            // Tambah kombinasi baru
            foreach ($newCombinations as $comb) {
                $key = $comb['size'] . '|' . $comb['colour'];
                if (!in_array($key, $oldKeys)) {
                    $newDetail = new Detail();
                    $newDetail->item_id = $item->id;
                    $newDetail->size = $comb['size'];
                    $newDetail->colour = $comb['colour'];
                    $newDetail->stock = 0; // default stock 0
                    $newDetail->save();

                    // Buat slot gambar (kalau perlu), hanya jika belum ada
                    if ($comb['colour'] !== null && !Image::where('item_id', $item->id)->where('colour', $comb['colour'])->exists()) {
                        Image::create([
                            'item_id' => $item->id,
                            'colour' => $comb['colour'],
                            'image_path' => null, // default kosong
                        ]);
                    }
                }
            }

            // Hapus kombinasi lama yang sudah tidak ada
            foreach ($oldDetails as $detail) {
                $key = $detail->size . '|' . $detail->colour;
                if (!in_array($key, $newKeys)) {
                    // Hapus detail
                    $detail->delete();

                    // Hapus slot gambar juga kalau warnanya sudah tidak ada
                    if (!in_array($detail->colour, array_column($newCombinations, 'colour'))) {
                        Image::where('item_id', $item->id)
                            ->where('colour', $detail->colour)
                            ->delete();
                    }
                }
            }

            DB::commit();
            return redirect()->route('items.details', $item->id)->with('success', 'Item berhasil diupdate.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal update: ' . $e->getMessage())->withInput();
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        // Contoh: password admin dari user login
        $user = auth()->user();
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['status' => 'error', 'message' => 'Password salah!']);
        }

        // Hapus item
        $item = Item::findOrFail($id);
        $item->delete();

        return response()->json(['status' => 'success', 'message' => 'Item berhasil dihapus.']);
    }




    public function print(){
        $items = Detail::with('item', 'item.category')->get();
        $items = $items->toArray();

        $pdf = Pdf::loadView('dashboard.item.print', [
            'items' => $items
        ]);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('Laporan Stok Barang Shabrina' . ' - ' . date('Ymd') . '.pdf');
    }



    /**
     * Create item details for the new item.
     */
    private function createItemDetails($item, $sizes = [], $colours = [])
    {
        $sizes = is_array($sizes) ? array_filter($sizes) : [];
        $colours = is_array($colours) ? array_filter($colours) : [];

        if (count($sizes) && count($colours)) {
            // Kombinasi semua size dan colour
            foreach ($sizes as $size) {
                foreach ($colours as $colour) {
                    Detail::create([
                        'item_id' => $item->id,
                        'size' => $size,
                        'colour' => $colour,
                        'stock' => 0,
                    ]);
                }
            }
        } elseif (count($sizes)) {
            // Hanya size
            foreach ($sizes as $size) {
                Detail::create([
                    'item_id' => $item->id,
                    'size' => $size,
                    'colour' => null,
                    'stock' => 0,
                ]);
            }
        } elseif (count($colours)) {
            // Hanya colour
            foreach ($colours as $colour) {
                Detail::create([
                    'item_id' => $item->id,
                    'size' => null,
                    'colour' => $colour,
                    'stock' => 0,
                ]);
            }
        } else {
            // Tidak ada size dan colour, buat satu detail kosong
            Detail::create([
                'item_id' => $item->id,
                'size' => null,
                'colour' => null,
                'stock' => 0,
            ]);
        }
    }




    private function createImageSlots($item, $colours = [])
    {
        $colours = is_array($colours) ? array_filter($colours) : [];

        // Slot wajib (general)
        for( $i = 0; $i < 5; $i++) {
            // Buat 5 slot kosong untuk gambar umum
            Image::create([
                'item_id' => $item->id,
                'colour' => null,
                'image_name' => null,
            ]);
        }

        // Slot per colour jika ada
        foreach ($colours as $colour) {
            Image::create([
                'item_id' => $item->id,
                'colour' => $colour,
                'image_name' => null,
            ]);
        }
    }


}
