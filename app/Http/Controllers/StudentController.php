<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\JadwalDosen;
use App\Models\Notifikasi;

class StudentController extends Controller
{
   public function index()
{
    $namaMahasiswa = session('mahasiswa_nama', 'Cristania Apriliani Hutagaol'); 
    
    // Ambil data hanya milik mahasiswa yang sedang login
    $pengajuanList = Konsultasi::where('nama_mahasiswa', $namaMahasiswa)->latest()->get();
    
    $totalBimbingan = $pengajuanList->where('status', 'Selesai')->count();
    $totalTerjadwal = $pengajuanList->where('status', 'Disetujui')->count();
    
    // Ambil maksimal 5 pengajuan terbaru untuk tabel di dashboard
    $riwayatKonsultasi = $pengajuanList->take(5);

    // Kirim semua variabel yang dibutuhkan oleh view student (dashboard)
    return view('student', compact('pengajuanList', 'riwayatKonsultasi', 'totalBimbingan', 'totalTerjadwal'));
}

public function statusPengajuan()
{
    $namaMahasiswa = session('mahasiswa_nama');
    
    // Filter status pengajuan khusus mahasiswa aktif
    $statusList = Konsultasi::where('nama_mahasiswa', $namaMahasiswa)->get();
    
    return view('mahasiswa.status-pengajuan', compact('statusList'));
}

    public function daftarBimbingan()
    {
        $daftarBimbinganList = JadwalDosen::where('status', 'Tersedia')->get();
        return view('mahasiswa.daftar-bimbingan', compact('daftarBimbinganList'));
    }

    // PERBAIKAN: Ambil data dari tabel jadwal_dosens agar jadwal dari dosen tampil di mahasiswa
    public function jadwalSaya()
    {
        $jadwalList = JadwalDosen::all(); 
        return view('mahasiswa.jadwal', compact('jadwalList'));
    }


    public function notifikasi()
    {
        $notifikasiList = Notifikasi::latest()->get();
        return view('mahasiswa.notifikasi', compact('notifikasiList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dosen' => 'required',
            'topik' => 'required',
            'waktu_konsultasi' => 'required',
        ]);

        Konsultasi::create([
            'nim' => session('mahasiswa_nim', '2108107010023'),
            'nama_mahasiswa' => session('mahasiswa_nama', 'Robben Sinaga'),
            'nama_dosen' => $request->nama_dosen,
            'topik' => $request->topik,
            'waktu_konsultasi' => $request->waktu_konsultasi,
            'tanggal' => date('Y-m-d'),
            'status' => 'Menunggu'
        ]);

        Notifikasi::create([
            'judul' => 'Pengajuan Bimbingan Dikirim',
            'pesan' => 'Pengajuan topik "' . $request->topik . '" ke ' . $request->nama_dosen . ' sedang menunggu persetujuan.',
        ]);

        // Sesuaikan nama rute redirect ini dengan yang ada di web.php kamu
        return redirect()->route('mahasiswa.status-pengajuan')->with('success', 'Pengajuan bimbingan berhasil dikirim!');
    }
    // Membatalkan pengajuan bimbingan oleh mahasiswa
// Membatalkan pengajuan bimbingan oleh mahasiswa
public function batalPengajuan($id)
{
    $konsultasi = Konsultasi::findOrFail($id);

    // Keamanan tambahan: Hanya boleh batalkan jika statusnya masih 'Menunggu'
    if (strtolower($konsultasi->status) == 'menunggu') {
        $konsultasi->update([
            'status' => 'Dibatalkan'
        ]);
        return redirect()->route('mahasiswa.status-pengajuan')->with('success', 'Pengajuan bimbingan berhasil dibatalkan.');
    }

    return redirect()->route('mahasiswa.status-pengajuan')->with('error', 'Pengajuan yang sudah diproses tidak dapat dibatalkan.');
}
}