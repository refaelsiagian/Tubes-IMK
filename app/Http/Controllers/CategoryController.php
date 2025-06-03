<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Item;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount('items')->get();

        return view('dashboard.category.index', [
            'categories' => $categories,
            'active' => 'category',
            'page' => 'Data Kategori - Shabrina'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:255',
            'category_description' => 'required|max:255',
            'category_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Optional image validation
        ]);
        
        //check if category name already exists
        $category = Category::where('category_name', $request->category_name)->first();
        if ($category) {
            return redirect()->route('categories.index')->with('error', 'Kategori sudah ada.');
        }
        
        // Make the category name always in capital case
        $categoryName = ucwords(strtolower($request->category_name));
        $request->merge(['category_name' => $categoryName]);

        // Buat slug dan nama baru
        $categoryName = ucwords(strtolower($request->category_name));
        $slug = str_replace(' ', '-', strtolower($categoryName));

        // Simpan image kalau ada
        $imagePath = null;
        if ($request->hasFile('category_image')) {
            $imagePath = $request->file('category_image')->store('categories', 'public');
        }

        // Buat data array
        $data = [
            'category_name' => $categoryName,
            'category_slug' => $slug,
            'category_description' => $request->category_description,
            'category_image' => $imagePath,
        ];

        // Simpan data
        Category::create($data);


        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        $items = Item::where('category_id', $id)->get();
    
        // $category->loadCount('items');
        // $category->load('items');

        return view('dashboard.category.show', [
            'active' => 'category',
            'items' => $items,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|max:255',
            'category_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $category = Category::findOrFail($id);

        // Format nama category baru
        $categoryName = ucwords(strtolower($request->category_name));
        $slug = str_replace(' ', '-', strtolower($categoryName));

        // Cek jika nama category tidak berubah
        if ($category->category_name === $categoryName && !$request->hasFile('category_image')) {
            return redirect()->route('categories.index')->with('success', 'Kategori tidak ada perubahan.');
        }

        // Cek apakah category name sudah ada (exclude diri sendiri)
        $existingCategory = Category::where('category_name', $categoryName)
                                    ->where('id', '!=', $category->id)
                                    ->first();
        if ($existingCategory) {
            return redirect()->route('categories.index')->with('error', 'Kategori sudah ada.');
        }

        // Siapkan data untuk update
        $data = [
            'category_name' => $categoryName,
            'category_slug' => $slug,
        ];

        // Handle image upload jika ada
        if ($request->hasFile('category_image')) {
            // Hapus image lama jika ada
            if ($category->category_image && \Storage::disk('public')->exists($category->category_image)) {
                \Storage::disk('public')->delete($category->category_image);
            }

            // Simpan image baru
            $imagePath = $request->file('category_image')->store('categories', 'public');
            $data['category_image'] = $imagePath;
        }

        // Update data
        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        
        // Check if the category has items
        if ($category->items()->count() > 0) {
            return redirect()->route('categories.index')->with('error', 'Kategori tidak dapat dihapus karena memiliki item.');
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
