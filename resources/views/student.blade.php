<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa - BIMAKA</title>
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
                <a href="{{ route('student.dashboard') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl bg-blue-600 text-white font-semibold text-sm shadow-md shadow-blue-600/30">
                    <span class="text-lg">📊</span> Dashboard
                </a>
                <a href="{{ route('mahasiswa.daftar-bimbingan') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg">📅</span> Daftar Bimbingan
                </a>
                <a href="{{ route('mahasiswa.jadwal') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg">⏰</span> Jadwal
                </a>
                <a href="{{ route('mahasiswa.status-pengajuan') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg">📋</span> Status Pengajuan
                </a>
                <a href="{{ route('mahasiswa.notifikasi') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg">🔔</span> Notifikasi
                </a>
            </nav>
        </div>
        <div>
            <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-500/10 rounded-2xl font-semibold transition text-sm">
                <span class="text-lg">🚪</span> Logout
            </a>
        </div>
    </aside>

    <!-- KONTEN UTAMA -->
    <main class="flex-1 flex flex-col overflow-y-auto">
        
        <!-- NAVBAR ATAS -->
        <header class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between">
            <div class="text-xs font-bold text-slate-500 tracking-wide">
                Portal Mahasiswa <span class="mx-2 text-slate-300">/</span> <span class="text-slate-900">Dashboard</span>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-slate-900">{{ session('mahasiswa_nama', 'Robben Sinaga') }}</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-extrabold text-xs shadow-sm">
                    {{ substr(session('mahasiswa_nama', 'Robben Sinaga'), 0, 2) }}
                </div>
            </div>
        </header>

        <div class="p-8 space-y-6 max-w-7xl mx-auto w-full">
            
            <!-- Banner Sambutan -->
            <div class="bg-gradient-to-r from-blue-900 to-indigo-900 text-white p-8 rounded-3xl shadow-xl flex items-center justify-between relative overflow-hidden">
                <div class="relative z-10 max-w-xl">
                    <span class="px-3 py-1 bg-white/10 text-blue-300 text-xs font-bold rounded-full border border-white/15">🟢 Mahasiswa Aktif</span>
                    <h2 class="text-2xl font-extrabold mt-3 mb-2">Halo, {{ session('mahasiswa_nama', 'Robben Sinaga') }}! 🎓</h2>
                    <p class="text-xs text-blue-100 leading-relaxed">
                        Ajukan jadwal bimbingan Tugas Akhir atau konsultasi akademik dengan dosen pembimbing Anda dengan mudah dan cepat melalui sistem terpusat BIMAKA.
                    </p>
                </div>
                <div class="hidden md:block text-5xl relative z-10">💻</div>
                <div class="absolute -right-10 -bottom-10 w-60 h-60 bg-blue-600/20 rounded-full blur-3xl"></div>
            </div>

            <!-- Kotak Statistik / Ringkasan -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Bimbingan</p>
                    <h3 class="text-3xl font-extrabold text-slate-900 mt-2">{{ isset($totalBimbingan) ? $totalBimbingan : '0' }}</h3>
                    <span class="inline-block mt-3 text-xs text-slate-400 font-medium">Kegiatan</span>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Jadwal Terjadwal</p>
                    <h3 class="text-3xl font-extrabold text-slate-900 mt-2">{{ isset($totalTerjadwal) ? $totalTerjadwal : '0' }}</h3>
                    <span class="inline-block mt-3 text-xs text-slate-400 font-medium">Sesi</span>
                </div>

               <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Status Terakhir</p>
    <div class="mt-3">
        @php
            $latestItem = isset($riwayatKonsultasi) ? $riwayatKonsultasi->first() : null;
        @endphp

        @if($latestItem)
            @if(strtolower($latestItem->status) == 'disetujui')
                <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-xs font-bold rounded-full">Disetujui</span>
            @elseif(strtolower($latestItem->status) == 'ditolak')
                <span class="px-3 py-1 bg-red-50 text-red-600 text-xs font-bold rounded-full">Ditolak</span>
            @elseif(strtolower($latestItem->status) == 'dibatalkan')
                <span class="px-3 py-1 bg-slate-100 text-slate-500 text-xs font-bold rounded-full">Dibatalkan</span>
            @else
                <span class="px-3 py-1 bg-amber-50 text-amber-600 text-xs font-bold rounded-full">Menunggu</span>
            @endif
        @else
            <span class="px-3 py-1 bg-slate-100 text-slate-600 text-xs font-bold rounded-full">Belum ada</span>
        @endif
    </div>
</div>
            </div>

            <!-- Tabel Riwayat & Status Pengajuan (Kosong Bersih Menunggu Database) -->
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-base">Pengajuan Terbaru</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Pantau status persetujuan jadwal bimbingan Anda dari dosen pembimbing.</p>
                    </div>
                    <span class="text-xs text-slate-400 bg-slate-50 px-3 py-1.5 rounded-xl border border-slate-200 font-medium">Real-time</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-400 text-[11px] font-bold uppercase tracking-wider border-b border-slate-100">
                                <th class="py-4 px-6">Jenis Pengajuan</th>
                                <th class="py-4 px-6">Tanggal Pengajuan</th>
                                <th class="py-4 px-6 text-right">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm">
                            @if(isset($riwayatKonsultasi) && count($riwayatKonsultasi) > 0)
                                @foreach($riwayatKonsultasi as $item)
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="py-4 px-6 font-bold text-slate-900">{{ $item->topik }}</td>
                                    <td class="py-4 px-6 text-xs text-slate-500 font-medium">{{ $item->waktu_konsultasi }}</td>
                                    <td class="py-4 px-6 text-right">
                                        <span class="px-3 py-1 bg-amber-100 text-amber-700 text-xs font-bold rounded-full uppercase">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="py-16 text-center text-slate-400">
                                        <div class="text-4xl mb-2">📋</div>
                                        <p class="text-sm font-bold text-slate-700">Belum ada pengajuan bimbingan terbaru.</p>
                                        <p class="text-xs text-slate-400 mt-1">Pengajuan konsultasi Anda akan otomatis muncul di sini.</p>
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