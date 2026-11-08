<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\JadwalDosen;

class DosenController extends Controller
{
    // Dashboard Dosen
    public function index()
    {
        $permintaanBaru = Konsultasi::where('status', 'Menunggu')->get();
        $jumlahMahasiswa = Konsultasi::where('status', 'Disetujui')->distinct('nim')->count();
        $jumlahPermintaan = $permintaanBaru->count();
        $jumlahSelesai = Konsultasi::where('status', 'Selesai')->count();

        return view('dosen', compact('permintaanBaru', 'jumlahMahasiswa', 'jumlahPermintaan', 'jumlahSelesai'));
    }

    // Halaman Jadwal Dosen
    public function jadwalIndex()
    {
        $jadwalList = JadwalDosen::all();
        return view('dosen.jadwal', compact('jadwalList'));
    }

    // Simpan Jadwal Baru oleh Dosen (POST)
    public function jadwalStore(Request $request)
    {
        // Validasi input disesuaikan dengan name="" di form Blade (keterangan)
        $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruang' => 'required',
            'keterangan' => 'required',
        ]);

        // Simpan ke database
        JadwalDosen::create([
            'nama_dosen' => session('dosen_nama', 'Dr. Budi Santoso'),
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'ruang' => $request->ruang,
            'topik' => $request->keterangan, // Memasukkan input 'keterangan' ke kolom 'topik' database
            'status' => 'Tersedia'
        ]);

        return redirect()->route('dosen.jadwal')->with('success', 'Jadwal bimbingan berhasil ditambahkan!');
    }

    // Halaman Daftar Pengajuan Bimbingan
    public function pengajuanIndex()
    {
        $pengajuanList = Konsultasi::all();
        return view('dosen.pengajuan', compact('pengajuanList'));
    }

    // Halaman Riwayat Catatan / Bimbingan Selesai
    public function catatanIndex()
{
    $riwayatList = Konsultasi::where('status', 'Selesai')->latest()->get();
    return view('dosen.catatan', compact('riwayatList')); // Sesuaikan nama view jika file Anda berada di folder dosen/catatan.blade.php
}
    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required',
    ]);

    $konsultasi = Konsultasi::findOrFail($id);
    $konsultasi->status = $request->status;
    $konsultasi->save();

    return redirect()->route('dosen.pengajuan')->with('success', 'Status pengajuan berhasil diperbarui!');
}
// Memperbarui Jadwal oleh Dosen
    public function jadwalUpdate(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruang' => 'required',
            'keterangan' => 'required',
        ]);

        $jadwal = JadwalDosen::findOrFail($id);
        $jadwal->update([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'ruang' => $request->ruang,
            'topik' => $request->keterangan,
        ]);

        return redirect()->route('dosen.jadwal')->with('success', 'Jadwal bimbingan berhasil diperbarui!');
    }

    // Menghapus Jadwal oleh Dosen
    public function jadwalDestroy($id)
    {
        $jadwal = JadwalDosen::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('dosen.jadwal')->with('success', 'Jadwal bimbingan berhasil dihapus!');
    }
}