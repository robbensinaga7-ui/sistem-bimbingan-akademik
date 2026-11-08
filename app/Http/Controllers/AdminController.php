<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;
use App\Models\Konsultasi;
use App\Models\JadwalDosen;

class AdminController extends Controller
{
    public function index()
    {
        $totalMahasiswa  = UserAccount::where('role', 'LIKE', '%mahasiswa%')
                                    ->orWhere('role', 'LIKE', '%Mahasiswa%')
                                    ->count();
                                    
        $totalDosen      = UserAccount::where('role', 'LIKE', '%dosen%')
                                    ->orWhere('role', 'LIKE', '%Dosen%')
                                    ->count();
                                    
        $pengajuanAktif  = Konsultasi::whereIn('status', ['menunggu', 'disetujui'])->count();
        
        $daftarPengajuan = Konsultasi::latest()->take(5)->get();

        return view('admin', compact('totalMahasiswa', 'totalDosen', 'pengajuanAktif', 'daftarPengajuan'));
    }

    // Menampilkan jadwal di Admin
    public function jadwalIndex()
    {
        $jadwalList = JadwalDosen::all();
        return view('jadwal', compact('jadwalList')); 
    }

    // Menampilkan daftar pengajuan bimbingan di Admin
    public function pengajuanIndex()
    {
        $pengajuanList = Konsultasi::latest()->get();
        return view('pengajuan', compact('pengajuanList'));
    }

    // Memperbarui data pengajuan oleh Admin
    public function pengajuanUpdate(Request $request, $id)
    {
        $request->validate([
            'nama_mahasiswa' => 'required',
            'nim' => 'required',
            'nama_dosen' => 'required',
            'topik' => 'required',
            'waktu_konsultasi' => 'required',
            'status' => 'required',
        ]);

        $konsultasi = Konsultasi::findOrFail($id);
        $konsultasi->update([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nim' => $request->nim,
            'nama_dosen' => $request->nama_dosen,
            'topik' => $request->topik,
            'waktu_konsultasi' => $request->waktu_konsultasi,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.pengajuan')->with('success', 'Pengajuan bimbingan berhasil diperbarui!');
    }

    // Menghapus data pengajuan oleh Admin
    public function pengajuanDestroy($id)
    {
        $konsultasi = Konsultasi::findOrFail($id);
        $konsultasi->delete();

        return redirect()->route('admin.pengajuan')->with('success', 'Pengajuan bimbingan berhasil dihapus!');
    }
    // Menampilkan halaman laporan dan rekap data bimbingan di Admin
    public function laporanIndex()
    {
        $totalBimbingan = Konsultasi::count();
        $totalDisetujui = Konsultasi::where('status', 'Disetujui')->count();
        $totalDitolak = Konsultasi::where('status', 'Ditolak')->count();
        
        $laporanList = Konsultasi::latest()->get();

        return view('laporan', compact('totalBimbingan', 'totalDisetujui', 'totalDitolak', 'laporanList'));
    }
}