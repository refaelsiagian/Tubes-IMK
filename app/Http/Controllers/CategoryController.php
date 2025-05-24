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
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:255',
        ]);
        
        //check if category name already exists
        $category = Category::where('category_name', $request->category_name)->first();
        if ($category) {
            return redirect()->route('categories.index')->with('error', 'Kategori sudah ada.');
        }
        
        // Make the category name always in capital case
        $categoryName = ucwords(strtolower($request->category_name));
        $request->merge(['category_name' => $categoryName]);

        // Create a slug from the category name
        $slug = str_replace(' ', '-', strtolower($request->category_name));
        $request->merge(['category_slug' => $slug]);

        Category::create($request->all());

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
        ]);

        $category = Category::findOrFail($id);
        
        // Check if the category name is not changed
        if ($category->category_name === $request->category_name) {
            return redirect()->route('categories.index')->with('success', 'Kategori tidak ada perubahan.');
        }

        // Check if the category name already exists
        if ($category->category_name !== $request->category_name) {
            $existingCategory = Category::where('category_name', $request->category_name)->first();
            if ($existingCategory) {
                return redirect()->route('categories.index')->with('error', 'Kategori sudah ada.');
            }
        }

        // Make the category name always in capital case
        $categoryName = ucwords(strtolower($request->category_name));
        $request->merge(['category_name' => $categoryName]);

        $slug = str_replace(' ', '-', strtolower($request->category_name));
        $request->merge(['category_slug' => $slug]);

        $category->update($request->all());

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
