<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
// use App\Models\Product;

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
        // Menampilkan halaman koleksi
        return view('catalogue.collection');
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
