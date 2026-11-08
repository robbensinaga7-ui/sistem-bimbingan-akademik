<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen - BIMAKA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-100 flex h-screen overflow-hidden">

    <!-- SIDEBAR KIRI -->
    <aside class="w-64 bg-[#0f172a] text-white flex flex-col justify-between p-6">
        <div>
            <div class="flex items-center gap-3 mb-10">
                <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center font-extrabold text-lg shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-extrabold tracking-wide">BIMAKA</h2>
                    <span class="text-[10px] text-blue-400 font-bold tracking-wider uppercase">Bimbingan Akademik</span>
                </div>
            </div>

            <nav class="space-y-1.5">
                <a href="{{ route('dosen.dashboard') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl bg-blue-600 text-white font-semibold text-sm shadow-md shadow-blue-600/30">
                    <span class="text-lg">📊</span> Dashboard
                </a>
                <a href="{{ route('dosen.jadwal') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg">📅</span> Jadwal Saya
                </a>
                <a href="{{ route('dosen.pengajuan') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg">📋</span> Pengajuan Bimbingan
                </a>
                <a href="{{ route('dosen.catatan') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg">⏱️</span> Riwayat Bimbingan
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg">🔔</span> Notifikasi
                </a>
            </nav>
        </div>

        <div>
            <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-500/10 rounded-2xl font-semibold transition text-sm">
                <span class="text-lg">🚪</span> Keluar Portal
            </a>
        </div>
    </aside>

    <!-- KONTEN UTAMA KANAN -->
    <main class="flex-1 flex flex-col overflow-y-auto">
        
        <!-- NAVBAR ATAS -->
        <header class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between">
            <div class="text-xs font-bold text-slate-400 tracking-wide uppercase">
                PORTAL AKADEMIK • TAHUN AJARAN 2024/2025 GENAP
            </div>
            
            <div class="flex items-center gap-4">
                <button class="w-10 h-10 rounded-full bg-slate-100 hover:bg-slate-200 flex items-center justify-center text-slate-600 transition">🔍</button>
                <button class="w-10 h-10 rounded-full bg-slate-100 hover:bg-slate-200 flex items-center justify-center text-slate-600 transition">🔔</button>

                <!-- Info Profil Dosen dengan session khusus dosen_nama -->
                <!-- Info Profil Dosen Mengambil Data dari Session Database -->
<div class="flex items-center gap-3 pl-2 border-l border-slate-200">
    <div class="text-right hidden sm:block">
        <p class="text-sm font-bold text-slate-900">{{ session('dosen_nama', 'Robben Lamtipando Sinaga') }}</p>
        <p class="text-[11px] text-slate-400">NIDN: {{ session('dosen_nidn', '3312511075') }}</p>
    </div>
    <div class="w-10 h-10 rounded-full bg-blue-900 text-white flex items-center justify-center font-bold">
        {{ substr(session('dosen_nama', 'R'), 0, 1) }}
    </div>
</div>
            </div>
        </header>

        <div class="p-8 space-y-6">
            
            <!-- BANNER SAMBUTAN -->
            <div class="bg-gradient-to-r from-blue-900 to-indigo-900 text-white p-8 rounded-3xl shadow-xl flex items-center justify-between relative overflow-hidden">
                <div class="relative z-10 max-w-xl">
                    <span class="px-3 py-1 bg-white/10 text-blue-300 text-xs font-bold rounded-full border border-white/15">🟢 Siap Membimbing</span>
                    <h2 class="text-2xl font-extrabold mt-3 mb-2">Halo, {{ session('dosen_nama', session('nama', 'Dosen Pembimbing')) }}! 👨‍🏫</h2>
                    <p class="text-xs text-blue-100 leading-relaxed">
                        Kelola jadwal konsultasi, tinjau progres tugas akhir mahasiswa, dan berikan validasi atau catatan revisi dengan mudah.
                    </p>
                </div>
                <div class="hidden md:block text-5xl relative z-10">📚</div>
                <div class="absolute -right-10 -bottom-10 w-60 h-60 bg-blue-600/20 rounded-full blur-3xl"></div>
            </div>

            <!-- KOTAK STATISTIK -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Mahasiswa Bimbingan</p>
                    <h3 class="text-3xl font-extrabold text-slate-900 mt-2">{{ $jumlahMahasiswa ?? 0 }}</h3>
                    <span class="inline-block mt-3 px-2.5 py-1 bg-blue-50 text-blue-600 text-[11px] font-bold rounded-lg">Aktif semester ini</span>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Permintaan Jadwal Baru</p>
                    <h3 class="text-3xl font-extrabold text-slate-900 mt-2">{{ $jumlahPermintaan ?? 0 }}</h3>
                    <span class="inline-block mt-3 px-2.5 py-1 bg-amber-50 text-amber-600 text-[11px] font-bold rounded-lg">Menunggu konfirmasi</span>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Selesai Dibimbing</p>
                    <h3 class="text-3xl font-extrabold text-slate-900 mt-2">{{ $jumlahSelesai ?? 0 }}</h3>
                    <span class="inline-block mt-3 px-2.5 py-1 bg-emerald-50 text-emerald-600 text-[11px] font-bold rounded-lg">Terdokumentasi</span>
                </div>
            </div>

            <!-- TABEL PERMINTAAN KONSULTASI MAHASISWA -->
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                    <h3 class="font-extrabold text-slate-900 text-base">Permintaan Konsultasi Mahasiswa</h3>
                    <span class="text-xs bg-slate-100 px-3 py-1 rounded-full font-bold text-slate-600">Real-time</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-400 text-[11px] font-bold uppercase tracking-wider border-b border-slate-100">
                                <th class="py-4 px-6">Mahasiswa</th>
                                <th class="py-4 px-6">Topik / Catatan</th>
                                <th class="py-4 px-6">Waktu Pengajuan</th>
                                <th class="py-4 px-6 text-right">Aksi Validasi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm">
                            @if(isset($permintaanBaru) && count($permintaanBaru) > 0)
                                @foreach($permintaanBaru as $item)
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="py-4 px-6">
                                        <p class="font-bold text-slate-900">{{ $item->nama_mahasiswa }}</p>
                                        <p class="text-xs text-slate-400">NIM: {{ $item->nim }}</p>
                                    </td>
                                    <td class="py-4 px-6 font-medium text-slate-700">{{ $item->topik }}</td>
                                    <td class="py-4 px-6 text-xs text-slate-500 font-medium">{{ $item->waktu_pengajuan }}</td>
                                    <td class="py-4 px-6 text-right space-x-2">
                                        <form action="#" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="px-3.5 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl shadow-sm transition">Setujui</button>
                                        </form>
                                        <form action="#" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="px-3.5 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-bold rounded-xl shadow-sm transition">Tolak</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="py-12 text-center text-slate-400">
                                        <div class="text-3xl mb-2">📭</div>
                                        <p class="text-sm font-bold text-slate-600">Belum ada pengajuan bimbingan masuk.</p>
                                        <p class="text-xs text-slate-400 mt-1">Data akan otomatis muncul di sini saat mahasiswa mengajukan jadwal baru.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

</body>
</html>