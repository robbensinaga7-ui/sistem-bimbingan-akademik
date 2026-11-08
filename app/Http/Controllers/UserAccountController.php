<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserAccount;

class UserAccountController extends Controller
{
    // Tampilkan halaman kelola pengguna beserta filter role dan pencarian
    public function index(Request $request)
    {
        $query = UserAccount::query();

        // Filter berdasarkan Role (Mahasiswa / Dosen) jika dipilih
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // Filter pencarian berdasarkan nama atau NIM/NIDN jika diketik
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'LIKE', "%{$search}%")
                  ->orWhere('nim_nidn', 'LIKE', "%{$search}%");
            });
        }

        $users = $query->get();

        return view('users', compact('users'));
    }

    // Simpan data pengguna baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim_nidn' => 'required|string|unique:user_accounts',
            'role' => 'required|string',
            'password' => 'required|string',
        ]);

        UserAccount::create([
            'nama' => $request->nama,
            'nim_nidn' => $request->nim_nidn,
            'role' => $request->role,
            'password' => $request->password,
        ]);

        // Arahkan kembali ke halaman users dengan pesan sukses
        return redirect()->route('admin.users')->with('success', 'Akun berhasil ditambahkan ke database!');
    }

    // Hapus pengguna dari database
    public function destroy($id)
    {
        UserAccount::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Pengguna berhasil dihapus!');
    }
}