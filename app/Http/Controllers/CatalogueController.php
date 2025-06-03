<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Item;
use App\Models\Detail;
use App\Models\Image;

class CatalogueController extends Controller
{
    public function index()
    {
        $categories = Category::whereHas('items', function ($query) {
            $query->where('item_status', 1);
        })->withCount(['items' => function ($query) {
            $query->where('item_status', 1);
        }])->get();

        // Ambil tanggal 3 bulan terakhir
        $threeMonthsAgo = Carbon::now()->subMonths(3);

        $topItems = DB::table('ticket_details')
            ->select(
                'item_id',
                DB::raw('SUM(item_quantity) as total_quantity')
            )
            ->where('created_at', '>=', $threeMonthsAgo)
            ->groupBy('item_id')
            ->orderByDesc('total_quantity')
            ->limit(12)
            ->get();

        $itemIds = $topItems->pluck('item_id')->toArray();

        $items = Item::with('images')
            ->whereIn('id', $itemIds)
            ->get()
            ->keyBy('id');

        // Bantuin ambil 2 gambar yang ada
        foreach ($items as $item) {
            $images = $item->images->filter(fn($img) => $img->image_name !== null)->values(); // Filter yang ada
            $item->main_image = $images->get(0) ? 'storage/' . $images->get(0)->image_name : 'catalogue/images/products/orange-1.jpg';
            $item->hover_image = $images->get(1) ? 'storage/' . $images->get(1)->image_name : 'catalogue/images/products/white-1.jpg';
        }

        // Mengambil data total kuantitas barang yang sudah dijual dari masing-masing item
        $items->selling_quantity = $topItems->mapWithKeys(function ($item) {
            return [$item->item_id => $item->total_quantity];
        });
        // dd($items->selling_quantity);

        // dd($items);

        // Menampilkan homepage
        return view('catalogue.index', [
            'categories' => $categories,
            'bests' => $items,
            'active' => 'home',
        ]);
    }

    public function categories()
    {
        // Menampilkan daftar kategori yang isi item-nya ada dan tidak nol
        // Mengambil semua kategori
        // dengan jumlah item yang lebih dari nol
        // Menggunakan withCount untuk menghitung jumlah item di setiap kategori
        $categories = Category::withCount(['items' => function ($query) {
            $query->where('item_status', 1); // Hanya ambil item yang aktif
        }])->having('items_count', '>', 0)->get();
        return view('catalogue.categories', compact('categories'));
    }

    public function categoryDetail($slug)
    {
        // Menampilkan detail kategori berdasarkan slug
        $category = Category::where('category_slug', $slug)->firstOrFail();
        $items = $category->items; // pastikan relasi `products` ada di model Category

        // Bantuin ambil 2 gambar yang ada
        foreach ($items as $item) {
            $images = $item->images->filter(fn($img) => $img->image_name !== null)->values(); // Filter yang ada
            $item->main_image = $images->get(0) ? 'storage/' . $images->get(0)->image_name : 'catalogue/images/products/orange-1.jpg';
            $item->hover_image = $images->get(1) ? 'storage/' . $images->get(1)->image_name : 'catalogue/images/products/white-1.jpg';
        }

        // return view('catalogue.detail-categories', compact('category', 'products'));
        return view('catalogue.detail-categories', compact('category', 'items'));
    }

    public function collection()
    {
        $title = "Semua Koleksi";

        $search = request('search');

        $query = Item::with(['images' => function ($query) {
            $query->whereNull('colour')->orderBy('id');
        }])->where('item_status', 1);

        if ($search) {
            $query->where('item_name', 'like', '%' . $search . '%');
            $title = 'Koleksi: ' . $search;
        }

        $items = $query->get();

        // Bantuin ambil 2 gambar yang ada
        foreach ($items as $item) {
            $images = $item->images->filter(fn($img) => $img->image_name !== null)->values(); // Filter yang ada
            $item->main_image = $images->get(0) ? 'storage/' . $images->get(0)->image_name : 'catalogue/images/products/orange-1.jpg';
            $item->hover_image = $images->get(1) ? 'storage/' . $images->get(1)->image_name : 'catalogue/images/products/white-1.jpg';
        }

        return view('catalogue.collection', compact('title', 'items'));
    }


    public function productDetail($slug)
    {
        // Menampilkan detail produk berdasarkan slug
        $product = Item::where('item_slug', $slug)->with('details', 'images')->firstOrFail();

        return view('catalogue.product', compact('product'));
    }

    public function about()
    {
        // Menampilkan halaman tentang
        return view('catalogue.about');
    }
}
