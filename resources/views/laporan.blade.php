<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - BIMAKA Academic Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in { animation: fadeIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        
        /* Animasi pengisian bar statistik */
        @keyframes fillBar { from { width: 0%; } to { width: var(--target-width); } }
        .animate-bar { animation: fillBar 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        /* CSS khusus untuk menyembunyikan menu saat dicetak */
        @media print {
            aside, header, .bg-white.p-5.rounded-3xl, button, .grid-cols-1.sm\:grid-cols-3, .stats-visual-card {
                display: none !important;
            }
            main {
                overflow: visible !important;
            }
            body {
                background-color: white !important;
            }
        }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-800 antialiased overflow-hidden">
    <div class="flex h-screen">
        
        <!-- SIDEBAR UTAMA -->
        <aside class="w-72 bg-[#1a2238] text-white flex flex-col justify-between hidden md:flex shadow-xl relative z-20">
            <div>
                <!-- Brand Header -->
                <div class="flex items-center gap-3.5 px-7 py-8 border-b border-slate-700/50">
                    <div class="bg-blue-600 text-white font-extrabold w-11 h-11 rounded-2xl flex items-center justify-center text-xl shadow-md shadow-blue-600/30">B</div>
                    <div>
                        <h1 class="font-extrabold text-base tracking-wider text-white">BIMAKA</h1>
                        <span class="text-[10px] text-blue-400 font-bold tracking-widest uppercase">Bimbingan Akademik</span>
                    </div>
                </div>

                <!-- Navigasi Menu -->
                <nav class="px-4 py-6 space-y-1.5">
                    <a href="/admin" class="flex items-center gap-3.5 px-4 py-3.5 text-slate-300 hover:bg-slate-800/80 hover:text-white rounded-2xl font-medium transition text-sm">
                        <span class="text-lg"></span> Dashboard
                    </a>
                    <a href="/admin/users" class="flex items-center gap-3.5 px-4 py-3.5 text-slate-300 hover:bg-slate-800/80 hover:text-white rounded-2xl font-medium transition text-sm">
                        <span class="text-lg"></span> Data User
                    </a>
                    <a href="/admin/jadwal" class="flex items-center gap-3.5 px-4 py-3.5 text-slate-300 hover:bg-slate-800/80 hover:text-white rounded-2xl font-medium transition text-sm">
                        <span class="text-lg"></span> Jadwal
                    </a>
                    <a href="/admin/pengajuan" class="flex items-center gap-3.5 px-4 py-3.5 text-slate-300 hover:bg-slate-800/80 hover:text-white rounded-2xl font-medium transition text-sm">
                        <span class="text-lg"></span> Pengajuan Bimbingan
                    </a>
                    <a href="/admin/laporan" class="flex items-center gap-3.5 px-4 py-3.5 bg-blue-600 text-white rounded-2xl font-semibold shadow-md shadow-blue-600/20 text-sm">
                        <span class="text-lg"></span> Laporan
                    </a>
                </nav>
            </div>

            <!-- Tombol Keluar Portal -->
            <div class="p-5 border-t border-slate-700/50">
                <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-500/10 rounded-2xl font-semibold transition text-sm">
                    <span class="text-lg"></span> Keluar
                </a>
            </div>
        </aside>

        <!-- KONTEN UTAMA -->
        <main class="flex-1 flex flex-col overflow-y-auto">
            
            <!-- HEADER ATAS -->
            <header class="bg-white border-b border-slate-200/80 px-8 py-4 flex justify-between items-center sticky top-0 z-10 shadow-sm">
                <div class="text-xs font-bold text-slate-400 tracking-wide">
                    🖥️ PORTAL AKADEMIK • TAHUN AJARAN 2025/2026 GENAP
                </div>
                <div class="flex items-center gap-4">
                    <button class="w-10 h-10 rounded-full bg-slate-100 hover:bg-slate-200 flex items-center justify-center text-slate-600 transition">🔍</button>
                    <button class="w-10 h-10 rounded-full bg-blue-50 hover:bg-blue-100 flex items-center justify-center text-blue-600 transition">🔔</button>
                    <div class="flex items-center gap-3 pl-2 border-l border-slate-200">
                        <div class="text-right hidden sm:block">
                            <p class="font-bold text-sm text-slate-800">{{ session('nama', 'Admin Akademik') }}</p>
                            <p class="text-[11px] text-slate-400">admin@bimaka.ac.id</p>
                        </div>
                        <div class="w-10 h-10 bg-blue-900 text-white rounded-full flex items-center justify-center font-bold text-sm shadow">
                            {{ substr(session('nama', 'A'), 0, 1) }}
                        </div>
                    </div>
                </div>
            </header>

            <!-- ISI KONTEN LAPORAN -->
            <div class="p-8 space-y-6 animate-fade-in max-w-7xl mx-auto w-full">
                
                <!-- Judul & Status Sinkronisasi -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Laporan & Statistik</h2>
                        <p class="text-sm text-slate-500 mt-1">Rekapitulasi data dan grafik performa bimbingan akademik real-time.</p>
                    </div>
                    <div class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 border border-emerald-200/60 px-4 py-2 rounded-2xl text-xs font-bold shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Sinkronisasi Otomatis
                    </div>
                </div>

                <!-- 3 Kotak Statistik Ringkasan -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm flex items-center justify-between transition hover:shadow-md">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Total Bimbingan</p>
                            <h3 class="text-3xl font-extrabold text-slate-900">{{ $totalBimbingan ?? 0 }}</h3>
                            <p class="text-[11px] text-slate-400 mt-1">Sesi terdata aktif</p>
                        </div>
                        <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl shadow-inner">📊</div>
                    </div>

                    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm flex items-center justify-between transition hover:shadow-md">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Disetujui</p>
                            <h3 class="text-3xl font-extrabold text-emerald-600">{{ $totalDisetujui ?? 0 }}</h3>
                            <p class="text-[11px] text-slate-400 mt-1">Telah disahkan dosen</p>
                        </div>
                        <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl shadow-inner">✅</div>
                    </div>

                    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm flex items-center justify-between transition hover:shadow-md">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Ditolak / Batal</p>
                            <h3 class="text-3xl font-extrabold text-red-600">{{ $totalDitolak ?? 0 }}</h3>
                            <p class="text-[11px] text-slate-400 mt-1">Perlu revisi / dibatalkan</p>
                        </div>
                        <div class="w-12 h-12 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center text-xl shadow-inner">❌</div>
                    </div>
                </div>

                <!-- KARTU VISUAL DIAGRAM / PROGRESS BAR STATISTIK -->
                @php
                    $total = ($totalBimbingan ?? 0) > 0 ? $totalBimbingan : 1; // Mencegah division by zero
                    $pctDisetujui = round((($totalDisetujui ?? 0) / $total) * 100);
                    $pctDitolak = round((($totalDitolak ?? 0) / $total) * 100);
                    $sisaLainnya = max(0, 100 - ($pctDisetujui + $pctDitolak));
                @endphp
                <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm space-y-4 stats-visual-card">
                    <div class="flex justify-between items-center">
                        <div>
                            <h4 class="font-extrabold text-slate-900 text-sm">Distribusi Status Pengajuan Bimbingan</h4>
                            <p class="text-xs text-slate-400">Persentase perbandingan status pengajuan secara visual.</p>
                        </div>
                        <span class="text-xs font-bold bg-slate-100 text-slate-600 px-3 py-1 rounded-xl">Live Progress</span>
                    </div>

                    <!-- Baris Progress Berwarna dengan Animasi -->
                    <div class="w-full bg-slate-100 h-4 rounded-full overflow-hidden flex shadow-inner">
                        <div class="bg-emerald-500 h-full transition-all duration-1000 animate-bar" style="--target-width: {{ $pctDisetujui }}%; width: {{ $pctDisetujui }}%" title="Disetujui: {{ $pctDisetujui }}%"></div>
                        <div class="bg-red-500 h-full transition-all duration-1000 animate-bar" style="--target-width: {{ $pctDitolak }}%; width: {{ $pctDitolak }}%" title="Ditolak/Batal: {{ $pctDitolak }}%"></div>
                        <div class="bg-amber-400 h-full transition-all duration-1000 animate-bar" style="--target-width: {{ $sisaLainnya }}%; width: {{ $sisaLainnya }}%" title="Menunggu/Lainnya: {{ $sisaLainnya }}%"></div>
                    </div>

                    <!-- Keterangan Legend Warna -->
                    <div class="flex flex-wrap items-center gap-6 pt-2 text-xs font-bold text-slate-600">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-emerald-500 shadow-sm"></span> Disetujui ({{ $pctDisetujui }}%)
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-red-500 shadow-sm"></span> Ditolak / Dibatalkan ({{ $pctDitolak }}%)
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-amber-400 shadow-sm"></span> Menunggu / Lainnya ({{ $sisaLainnya }}%)
                        </div>
                    </div>
                </div>

                <!-- Bagian Tabel Rekapitulasi -->
                <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
                    <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                        <div>
                            <h3 class="font-extrabold text-base text-slate-900">Data Rekapitulasi</h3>
                            <p class="text-xs text-slate-400 mt-0.5">Daftar rekap bimbingan yang masuk dari aktivitas akademik.</p>
                        </div>
                        <button onclick="cetakLaporan()" class="inline-flex items-center gap-2 bg-blue-700 hover:bg-blue-800 text-white text-xs px-5 py-2.5 rounded-2xl font-bold shadow-md shadow-blue-700/20 transition">
                            <span>📥</span> Cetak Laporan
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-sm">
                            <thead>
                                <tr class="bg-slate-50/80 text-slate-400 uppercase text-[11px] tracking-wider border-b border-slate-100 font-bold">
                                    <th class="px-6 py-4">No</th>
                                    <th class="px-6 py-4">Mahasiswa</th>
                                    <th class="px-6 py-4">Dosen</th>
                                    <th class="px-6 py-4">Tanggal</th>
                                    <th class="px-6 py-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @if(isset($laporanList) && count($laporanList) > 0)
                                    @foreach($laporanList as $index => $item)
                                    <tr class="hover:bg-slate-50/60 transition-colors">
                                        <td class="px-6 py-4 font-bold text-slate-500">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4">
                                            <p class="font-bold text-slate-900">{{ $item->nama_mahasiswa }}</p>
                                            <span class="text-xs text-slate-400">NIM: {{ $item->nim }}</span>
                                        </td>
                                        <td class="px-6 py-4 font-bold text-slate-700">{{ $item->nama_dosen }}</td>
                                        <td class="px-6 py-4">
                                            <p class="text-slate-800 font-medium">{{ $item->topik }}</p>
                                            <span class="text-xs text-slate-400">{{ $item->tanggal ?? $item->waktu_konsultasi }}</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            @if(strtolower($item->status) == 'disetujui')
                                                <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-xs font-bold rounded-full">Disetujui</span>
                                            @elseif(strtolower($item->status) == 'ditolak')
                                                <span class="px-3 py-1 bg-red-50 text-red-600 text-xs font-bold rounded-full">Ditolak</span>
                                            @elseif(strtolower($item->status) == 'selesai')
                                                <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-xs font-bold rounded-full">Selesai</span>
                                            @elseif(strtolower($item->status) == 'dibatalkan')
                                                <span class="px-3 py-1 bg-slate-100 text-slate-500 text-xs font-bold rounded-full">Dibatalkan</span>
                                            @else
                                                <span class="px-3 py-1 bg-amber-50 text-amber-600 text-xs font-bold rounded-full">Menunggu</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="px-6 py-14 text-center text-slate-400 font-medium">
                                            <div class="flex flex-col items-center justify-center space-y-2">
                                                <span class="text-4xl">📭</span>
                                                <p class="text-sm font-bold text-slate-700">Belum ada data laporan atau rekap bimbingan.</p>
                                                <p class="text-xs text-slate-400">Data rekapitulasi akan terisi otomatis seiring aktivitas bimbingan dosen dan mahasiswa.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <!-- Footer Pagination -->
                    <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                        <p class="font-medium">Menampilkan seluruh data rekapitulasi</p>
                        <div class="flex items-center gap-1 font-bold">
                            <span class="px-3 py-1.5 bg-blue-900 text-white rounded-xl shadow-sm">1</span>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- Script Cetak -->
    <script>
        function cetakLaporan() {
            window.print();
        }
    </script>
</body>
</html>