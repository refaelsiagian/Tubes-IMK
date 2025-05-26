<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Detail;
use App\Models\Image;

class CatalogueController extends Controller
{
    public function index()
    {
        // Menampilkan homepage
        return view('catalogue.index');
    }

    public function categories()
    {
        // Menampilkan daftar kategori
        // $categories = Category::all();
        // return view('catalogue.categories', compact('categories'));
        return view('catalogue.categories');
    }

    public function categoryDetail($slug)
    {
        // Menampilkan detail kategori berdasarkan slug
        // $category = Category::where('slug', $slug)->firstOrFail();
        // $products = $category->products; // pastikan relasi `products` ada di model Category

        // return view('catalogue.detail-categories', compact('category', 'products'));
        return view('catalogue.detail-categories');
    }

    public function collection()
    {
        $items = Item::with(['images' => function ($query) {
            $query->whereNull('colour')->orderBy('id'); // Ambil yang colour null & urut
        }])->where('item_status', 1)->get();

        // Bantuin ambil 2 gambar yang ada
        foreach ($items as $item) {
            $images = $item->images->filter(fn($img) => $img->image_name !== null)->values(); // Filter yang ada
            $item->main_image = $images->get(0) ? 'storage/' . $images->get(0)->image_name : 'catalogue/images/products/orange-1.jpg';
            $item->hover_image = $images->get(1) ? 'storage/' . $images->get(1)->image_name : 'catalogue/images/products/white-1.jpg';
        }

        return view('catalogue.collection', compact('items'));
    }


    public function productDetail($slug)
    {
        // Menampilkan detail produk berdasarkan slug
        // $product = Product::where('slug', $slug)->firstOrFail();
        // return view('catalogue.product', compact('product'));
        return view('catalogue.product');
    }

    public function about()
    {
        // Menampilkan halaman tentang
        return view('catalogue.about');
    }
}
