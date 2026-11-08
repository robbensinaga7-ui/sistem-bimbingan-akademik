<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Kontrol Administrator - BIMAKA</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes pulseGlow {
            0%, 100% { transform: scale(1); opacity: 0.9; }
            50% { transform: scale(1.05); opacity: 1; }
        }
        @keyframes floatAnim {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-6px); }
        }

        .animate-fade-in { animation: fadeIn 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .animate-float { animation: floatAnim 4s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulseGlow 3s ease-in-out infinite; }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glass-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 25px -5px rgba(30, 64, 175, 0.12), 0 8px 10px -6px rgba(30, 64, 175, 0.12);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased overflow-hidden">

    <div class="flex h-screen">
        
        <!-- SIDEBAR UTAMA (Nama menu disamakan persis seperti di Users: Dashboard, Data User, Jadwal, Pengajuan Bimbingan, Laporan) -->
        <aside class="w-72 bg-[#1a2238] text-white flex flex-col justify-between hidden md:flex shadow-2xl relative z-20 border-r border-slate-800">
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
                    <a href="/admin" class="flex items-center gap-3.5 px-4 py-3.5 bg-blue-600 text-white rounded-2xl font-semibold shadow-md shadow-blue-600/20 text-sm">
                        <span class="text-lg">📊</span> Dashboard
                    </a>
                    <a href="/admin/users" class="flex items-center gap-3.5 px-4 py-3.5 text-slate-300 hover:bg-slate-800/80 hover:text-white rounded-2xl font-medium transition text-sm">
                        <span class="text-lg">👥</span> Data User
                    </a>
                    <a href="/admin/jadwal" class="flex items-center gap-3.5 px-4 py-3.5 text-slate-300 hover:bg-slate-800/80 hover:text-white rounded-2xl font-medium transition text-sm">
                        <span class="text-lg">📅</span> Jadwal
                    </a>
                    <a href="/admin/pengajuan" class="flex items-center gap-3.5 px-4 py-3.5 text-slate-300 hover:bg-slate-800/80 hover:text-white rounded-2xl font-medium transition text-sm">
                        <span class="text-lg">📂</span> Pengajuan Bimbingan
                    </a>
                    <a href="/admin/laporan" class="flex items-center gap-3.5 px-4 py-3.5 text-slate-300 hover:bg-slate-800/80 hover:text-white rounded-2xl font-medium transition text-sm">
                        <span class="text-lg">📈</span> Laporan
                    </a>
                </nav>
            </div>

            <!-- Tombol Keluar Portal -->
            <div class="p-5 border-t border-slate-700/50">
                <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-500/10 rounded-2xl font-semibold transition text-sm">
                    <span class="text-lg">🚪</span> Keluar Portal
                </a>
            </div>
        </aside>

        <!-- KONTEN UTAMA -->
        <main class="flex-1 flex flex-col overflow-y-auto">
            
            <!-- NAVBAR / HEADER ATAS (Ukuran padding py-4, tinggi tombol, dan teks kiri-kanan disamakan persis dengan Users) -->
            <header class="bg-white border-b border-slate-200/80 px-8 py-4 flex justify-between items-center sticky top-0 z-10 shadow-sm">
                <div class="text-xs font-bold text-slate-400 tracking-wide">
                    🖥️ PORTAL AKADEMIK • TAHUN AJARAN 2025/2026 GENAP
                </div>
                
                <div class="flex items-center gap-4">
                    <button class="w-10 h-10 rounded-full bg-slate-100 hover:bg-slate-200 flex items-center justify-center text-slate-600 transition">🔍</button>
                    <button class="w-10 h-10 rounded-full bg-blue-50 hover:bg-blue-100 flex items-center justify-center text-blue-600 transition">🔔</button>

                    <!-- Info Profil Admin (Menggunakan session unik agar tidak tertukar) -->
                    <div class="flex items-center gap-3 pl-2 border-l border-slate-200">
                        <div class="text-right hidden sm:block">
                            <p class="font-bold text-sm text-slate-800">{{ session('admin_nama', session('nama', 'Admin Akademik')) }}</p>
                            <p class="text-[11px] text-slate-400">admin@bimaka.ac.id</p>
                        </div>
                        <div class="w-10 h-10 bg-blue-900 text-white rounded-full flex items-center justify-center font-bold text-sm shadow">
                            {{ substr(session('admin_nama', session('nama', 'A')), 0, 1) }}
                        </div>
                    </div>
                </div>
            </header>

            <!-- ISI KONTEN DASHBOARD ASLI -->
            <div class="p-8 space-y-8 animate-fade-in max-w-7xl mx-auto w-full">
                
                <!-- Welcome Banner -->
                <div class="relative overflow-hidden bg-gradient-to-r from-blue-900 via-blue-800 to-indigo-900 text-white p-8 rounded-3xl shadow-xl shadow-blue-900/10 flex justify-between items-center">
                    <div class="relative z-10 space-y-2">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/30 border border-blue-400/30 text-blue-200 text-xs font-semibold">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span> Sistem Aktif & Terhubung
                        </div>
                        <h2 class="text-3xl font-extrabold tracking-tight">Selamat Datang Kembali, {{ session('admin_nama', session('nama', 'Admin')) }}! ⚡</h2>
                        <p class="text-blue-100 text-sm max-w-xl leading-relaxed">Kelola data akun pengguna, validasi jadwal konsultasi, dan pantau seluruh aktivitas bimbingan akademik mahasiswa Polibatam secara terpusat.</p>
                    </div>
                    <div class="hidden md:flex text-6xl opacity-90 animate-float bg-white/10 p-6 rounded-3xl backdrop-blur-md shadow-inner border border-white/10">
                        🎓
                    </div>
                    <div class="absolute -right-10 -bottom-10 w-60 h-60 bg-blue-500/20 rounded-full blur-3xl pointer-events-none"></div>
                </div>

                <!-- Statistik Cards (Dinamis dari Database) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="glass-card p-7 rounded-3xl shadow-sm border border-slate-200/80 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full blur-2xl group-hover:bg-blue-100 transition-all"></div>
                        <div class="relative z-10">
                            <div class="flex justify-between items-center mb-3">
                                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Mahasiswa Terdaftar</p>
                                <span class="p-2.5 bg-blue-50 text-blue-600 rounded-2xl text-lg shadow-sm">👨‍🎓</span>
                            </div>
                            <h3 class="text-4xl font-extrabold text-slate-900 tracking-tight">{{ $totalMahasiswa ?? 0 }}</h3>
                            <div class="mt-3 inline-flex items-center gap-1.5 text-xs text-slate-500 font-bold bg-slate-100 px-2.5 py-1 rounded-xl">
                                <span>ℹ️</span> {{ (($totalMahasiswa ?? 0) > 0) ? 'Data aktif database' : 'Belum ada mahasiswa terdaftar' }}
                            </div>
                        </div>
                    </div>

                    <div class="glass-card p-7 rounded-3xl shadow-sm border border-slate-200/80 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-50 rounded-full blur-2xl group-hover:bg-indigo-100 transition-all"></div>
                        <div class="relative z-10">
                            <div class="flex justify-between items-center mb-3">
                                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Dosen Pembimbing</p>
                                <span class="p-2.5 bg-indigo-50 text-indigo-600 rounded-2xl text-lg shadow-sm">👩‍🏫</span>
                            </div>
                            <h3 class="text-4xl font-extrabold text-slate-900 tracking-tight">{{ $totalDosen ?? 0 }}</h3>
                            <div class="mt-3 inline-flex items-center gap-1.5 text-xs text-slate-500 font-bold bg-slate-100 px-2.5 py-1 rounded-xl">
                                <span>ℹ️</span> {{ (($totalDosen ?? 0) > 0) ? 'Data aktif database' : 'Belum ada dosen terdaftar' }}
                            </div>
                        </div>
                    </div>

                    <div class="glass-card p-7 rounded-3xl shadow-sm border border-slate-200/80 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-amber-50 rounded-full blur-2xl group-hover:bg-amber-100 transition-all"></div>
                        <div class="relative z-10">
                            <div class="flex justify-between items-center mb-3">
                                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Pengajuan Bimbingan Aktif</p>
                                <span class="p-2.5 bg-amber-50 text-amber-600 rounded-2xl text-lg shadow-sm">📂</span>
                            </div>
                            <h3 class="text-4xl font-extrabold text-slate-900 tracking-tight">{{ $pengajuanAktif ?? 0 }}</h3>
                            <div class="mt-3 inline-flex items-center gap-1.5 text-xs text-slate-500 font-bold bg-slate-100 px-2.5 py-1 rounded-xl">
                                <span>ℹ️</span> {{ (($pengajuanAktif ?? 0) > 0) ? 'Sedang berjalan' : 'Belum ada pengajuan aktif' }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel Pengajuan Masuk Terbaru -->
                <div class="bg-white rounded-3xl shadow-sm border border-slate-200/80 overflow-hidden">
                    <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                        <div>
                            <h3 class="font-extrabold text-lg text-slate-900">Daftar Pengajuan Masuk Terbaru</h3>
                            <p class="text-xs text-slate-500 mt-0.5">Aktivitas pengajuan bimbingan real-time dari sistem mahasiswa.</p>
                        </div>
                        <span class="text-xs bg-slate-100 text-slate-600 border border-slate-200 px-3.5 py-1.5 rounded-2xl font-bold tracking-wide">Real-time Database</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-sm">
                            <thead>
                                <tr class="bg-slate-50/80 text-slate-400 uppercase text-xs tracking-wider border-b border-slate-100 font-bold">
                                    <th class="px-8 py-4">Mahasiswa</th>
                                    <th class="px-6 py-4">Dosen Pembimbing</th>
                                    <th class="px-6 py-4">Waktu Konsultasi</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-8 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($daftarPengajuan) && count($daftarPengajuan) > 0)
                                    @foreach($daftarPengajuan as $item)
                                    <tr class="hover:bg-slate-50/50 transition border-b border-slate-100">
                                        <td class="px-8 py-4">
                                            <p class="font-bold text-slate-900">{{ $item->nama_mahasiswa }}</p>
                                            <p class="text-xs text-slate-400">NIM: {{ $item->nim }}</p>
                                        </td>
                                        <td class="px-6 py-4 font-medium text-slate-700">{{ $item->nama_dosen }}</td>
                                        <td class="px-6 py-4 text-xs text-slate-500 font-medium">{{ $item->waktu_konsultasi }}</td>
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
                                        <td class="px-8 py-4 text-center">
                                            <a href="#" class="text-blue-600 font-bold text-xs hover:underline">Kelola</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="px-8 py-12 text-center text-slate-400 font-medium">
                                            <div class="flex flex-col items-center justify-center space-y-2">
                                                <span class="text-3xl">📭</span>
                                                <p>Belum ada pengajuan bimbingan yang masuk dari sistem.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>

    </div>

</body>
</html>