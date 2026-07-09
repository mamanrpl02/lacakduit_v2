<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserControllers extends Controller
{
    // Menampilkan halaman utama (di sini juga modal berada)
    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

        // Jika dipanggil lewat AJAX JavaScript, kembalikan partial view saja
        if ($request->ajax()) {
            return view('users._list', compact('users'))->render();
        }

        // Jika dibuka langsung lewat browser
        return view('user', compact('users'));
    }


    // Proses Hapus Data
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }
}
