<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    // Menampilkan halaman utama (di sini juga modal berada)
    public function index()
    {

        $userId = Auth::id();

        $categories = Category::where('r_users', $userId)
            ->latest()
            ->paginate(3);



        return view('categories', compact('categories'));
    }

    // Proses Simpan Data Baru dari Modal Add
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:50',
            'type' => 'required|in:in,out',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'color' => 'nullable|string|max:255',

        ]);

        $icon = null;

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon')->store('categories', 'public');
        }

        Category::create([
            'name' => $request->name,
            'icon' => $icon,
            'color' => $request->color,
            'type' => $request->type,
            'description' => $request->description,
            'r_users' => auth()->user()->sys_id_r_user
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category.'));
    }

    // Proses Update Data dari Modal Edit
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'type' => 'required|in:in,out',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'color' => 'nullable|string|max:255',

        ]);

        $category->update($request->all());
        return redirect()->back()->with('success', 'Kategori berhasil diubah.');
    }

    // Proses Hapus Data
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success', 'Kategori berhasil dihapus.');
    }
}
