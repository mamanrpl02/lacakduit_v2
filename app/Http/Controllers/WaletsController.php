<?php

namespace App\Http\Controllers;

use App\Models\Walets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WaletsController extends Controller
{
    // Menampilkan halaman utama (di sini juga modal berada)
    public function index()
    {

        $userId = Auth::id();
        $walets = Walets::where('r_users', $userId)
            ->latest()
            ->paginate(3);

        return view('walet', compact('walets'));
    }

    // Proses Simpan Data Baru dari Modal Add
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',

        ]);

        $icon = null;

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon')->store('walets', 'public');
        }

        Walets::create([
            'name' => $request->name,
            'description' => $request->description,
            'icon' => $icon,
            'r_users' => auth()->user()->sys_id_r_user
        ]);

        return redirect()->back()->with('success', 'Walet berhasil ditambahkan.');
    }

    public function edit(Walets $walet)
    {
        return view('walets.edit', compact('walet'));
    }

    // Proses Update Data dari Modal Edit
    public function update(Request $request, Walets $walet)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',

        ]);

        $walet->update($request->all());
        return redirect()->back()->with('success', 'Walet berhasil diubah.');
    }

    // Proses Hapus Data
    public function destroy(Walets $walet)
    {
        $walet->delete();
        return redirect()->back()->with('success', 'Walet berhasil dihapus.');
    }
}
