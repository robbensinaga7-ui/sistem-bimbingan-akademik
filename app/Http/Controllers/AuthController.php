<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nim_nidn' => 'required',
            'password' => 'required',
        ]);

        $inputID = trim($request->nim_nidn);
        $inputPass = $request->password;

        // 1. Cek Admin Khusus Sistem
        if (strtolower($inputID) === 'admin' && $inputPass === 'admin123') {
            session([
                'admin_logged_in' => true,
                'admin_id' => 999,
                'admin_nama' => 'Administrator Sistem',
                'admin_role' => 'admin'
            ]);
            return redirect('/admin');
        }

        // 2. Cari User di Database MySQL (tabel user_accounts)
        $user = UserAccount::where('nim_nidn', $inputID)->first();

        // 3. Verifikasi Password dan Role
        if ($user && $inputPass === $user->password) {
            $roleLower = strtolower(trim($user->role));

            // Simpan session spesifik per role agar tidak saling menimpa di tab berbeda
            if ($roleLower === 'dosen') {
                session([
                    'dosen_logged_in' => true,
                    'dosen_id' => $user->id,
                    'dosen_nama' => $user->nama,
                    'dosen_nidn' => $user->nim_nidn,
                    'dosen_role' => $user->role
                ]);
                return redirect('/dosen');
            } elseif ($roleLower === 'mahasiswa') {
                session([
                    'mahasiswa_logged_in' => true,
                    'mahasiswa_id' => $user->id,
                    'mahasiswa_nama' => $user->nama,
                    'mahasiswa_nim' => $user->nim_nidn,
                    'mahasiswa_role' => $user->role
                ]);
                return redirect('/student');
            } else {
                session([
                    'admin_logged_in' => true,
                    'admin_id' => $user->id,
                    'admin_nama' => $user->nama,
                    'admin_role' => $user->role
                ]);
                return redirect('/admin');
            }
        }

        return redirect()->back()->with('error', 'NIM/NIDN atau Kata Sandi salah!');
    }
    // Menampilkan halaman pendaftaran (register)
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Memproses data registrasi akun baru
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim_nidn' => 'required|string|unique:user_accounts',
            'role' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        UserAccount::create([
            'nama' => $request->nama,
            'nim_nidn' => $request->nim_nidn,
            'role' => $request->role,
            'password' => $request->password, // Dapat disesuaikan dengan Hash jika diperlukan
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan masuk menggunakan NIM/NIDN dan kata sandi Anda.');
    }
}