<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::orderBy('id');
        
        if ($request->has('search') && $request->search) {
            $query->where('nama_kategori', 'like', '%' . $request->search . '%');
        }
        
        $categories = $query->get();
        
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        // Generate ID otomatis berdasarkan kategori terakhir + 1
        $nextId = Category::max('id') ? Category::max('id') + 1 : 1;
        
        return view('categories.create', compact('nextId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:categories,nama_kategori',
            'keterangan' => 'nullable|string'
        ]);

        Category::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('categories.index')->with('success', 'Data kategori berhasil disimpan!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:categories,nama_kategori,' . $id,
            'keterangan' => 'nullable|string'
        ]);

        $category->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('categories.index')->with('success', 'Data kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        
        return redirect()->route('categories.index')->with('success', 'Data kategori berhasil dihapus');
    }
}
