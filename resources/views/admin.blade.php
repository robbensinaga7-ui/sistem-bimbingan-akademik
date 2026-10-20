<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - BIMAKA</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-[#F8FAFC] font-sans antialiased text-slate-800 h-screen w-screen overflow-hidden flex">

    <!-- Sidebar Kiri (Dark Navy) -->
    <aside class="w-64 bg-[#1B2B4C] text-slate-300 flex flex-col justify-between p-5 shrink-0 h-full shadow-lg">
        <div>
            <!-- Logo BIMAKA -->
            <div class="flex items-center gap-3 px-2 py-3 mb-6 border-b border-slate-700/60">
                <div class="w-9 h-9 bg-gradient-to-tr from-blue-600 to-indigo-500 text-white rounded-xl font-extrabold flex items-center justify-center text-base shadow-md">B</div>
                <div>
                    <span class="font-bold text-white tracking-wide text-base block leading-none">BIMAKA</span>
                </div>
            </div>

            <!-- Menu Navigasi -->
            <nav class="space-y-1.5">
                <!-- Dashboard (Active) -->
                <a href="/admin" class="flex items-center gap-3 px-3.5 py-2.5 bg-blue-600 text-white font-medium rounded-xl text-xs transition shadow-sm shadow-blue-500/30">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span>Dashboard</span>
                </a>

                <!-- Data User -->
                <a href="/admin/users" class="flex items-center gap-3 px-3.5 py-2.5 text-slate-300 hover:bg-white/5 hover:text-white rounded-xl text-xs transition">
                    <i data-lucide="users" class="w-4 h-4"></i>
                    <span>Data User</span>
                </a>

                <!-- Jadwal -->
                <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-slate-300 hover:bg-white/5 hover:text-white rounded-xl text-xs transition">
                    <i data-lucide="calendar" class="w-4 h-4"></i>
                    <span>Jadwal</span>
                </a>

                <!-- Pengajuan Bimbingan -->
                <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-slate-300 hover:bg-white/5 hover:text-white rounded-xl text-xs transition">
                    <i data-lucide="file-text" class="w-4 h-4"></i>
                    <span>Pengajuan Bimbingan</span>
                </a>

                <!-- Laporan -->
                <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-slate-300 hover:bg-white/5 hover:text-white rounded-xl text-xs transition">
                    <i data-lucide="bar-chart-2" class="w-4 h-4"></i>
                    <span>Laporan</span>
                </a>

                <!-- Notifikasi -->
                <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-slate-300 hover:bg-white/5 hover:text-white rounded-xl text-xs transition">
                    <i data-lucide="bell" class="w-4 h-4"></i>
                    <span>Notifikasi</span>
                </a>

                <!-- Pengaturan -->
                <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-slate-300 hover:bg-white/5 hover:text-white rounded-xl text-xs transition">
                    <i data-lucide="settings" class="w-4 h-4"></i>
                    <span>Pengaturan</span>
                </a>
            </nav>
        </div>

        <!-- Tombol Logout -->
        <div class="pt-4 border-t border-slate-700/60">
            <a href="/" class="flex items-center gap-3 px-3 py-2.5 text-slate-300 hover:bg-red-500/10 hover:text-red-400 rounded-xl text-xs transition">
                <i data-lucide="log-out" class="w-4 h-4"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Content Area Full Width -->
    <div class="flex-1 flex flex-col h-full overflow-hidden bg-[#F8FAFC]">
        
        <!-- Header Top Bar -->
        <header class="h-16 bg-white border-b border-slate-200/80 px-8 flex items-center justify-between shrink-0">
            <div class="flex items-center gap-3 w-96">
                <div class="relative w-full">
                    <i data-lucide="search" class="absolute left-3 top-2.5 w-4 h-4 text-slate-400"></i>
                    <input type="text" placeholder="Cari data mahasiswa, dosen, atau aktivitas..." class="w-full pl-9 pr-4 py-2 bg-slate-100/80 border border-transparent focus:border-blue-500 rounded-xl text-xs focus:outline-none transition" />
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2 px-3 py-1.5 bg-emerald-50 border border-emerald-200 rounded-full text-emerald-600 text-xs font-semibold">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>System Active</span>
                </div>
                <div class="flex items-center gap-3 pl-3 border-l border-slate-200">
                    <div class="w-8 h-8 rounded-full bg-blue-600 text-white font-bold flex items-center justify-center text-xs shadow-sm">AD</div>
                    <div class="hidden sm:block text-left">
                        <p class="text-xs font-bold text-slate-800 leading-tight">Admin Utama</p>
                        <p class="text-[10px] text-slate-400">Administrator</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Body Scrollable -->
        <main class="flex-1 p-8 overflow-y-auto">
            <div class="max-w-7xl mx-auto space-y-8">
                
                <!-- Welcome Header -->
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-black text-slate-900 tracking-tight">Dashboard</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Selamat datang kembali, <span class="font-bold text-slate-700">Admin</span>. Berikut ringkasan sistem hari ini.</p>
                    </div>
                    <button class="flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-xl shadow-sm transition">
                        <i data-lucide="refresh-cw" class="w-3.5 h-3.5"></i> Refresh Data
                    </button>
                </div>

                <!-- 3 Cards Metrics -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    
                    <!-- Total Mahasiswa -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-200/70 shadow-sm hover:shadow-md transition group">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Mahasiswa</span>
                            <div class="p-2.5 bg-blue-50 text-blue-600 rounded-xl group-hover:bg-blue-600 group-hover:text-white transition">
                                <i data-lucide="users" class="w-5 h-5"></i>
                            </div>
                        </div>
                        <div class="flex items-baseline gap-2">
                            <h3 class="text-4xl font-black text-slate-900">120</h3>
                            <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md">+4 minggu ini</span>
                        </div>
                    </div>

                    <!-- Total Dosen -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-200/70 shadow-sm hover:shadow-md transition group">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Dosen</span>
                            <div class="p-2.5 bg-emerald-50 text-emerald-600 rounded-xl group-hover:bg-emerald-600 group-hover:text-white transition">
                                <i data-lucide="user-check" class="w-5 h-5"></i>
                            </div>
                        </div>
                        <div class="flex items-baseline gap-2">
                            <h3 class="text-4xl font-black text-emerald-600">45</h3>
                            <span class="text-xs font-semibold text-slate-400 bg-slate-100 px-2 py-0.5 rounded-md">Aktif</span>
                        </div>
                    </div>

                    <!-- Total Pengajuan -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-200/70 shadow-sm hover:shadow-md transition group">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Pengajuan</span>
                            <div class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl group-hover:bg-indigo-600 group-hover:text-white transition">
                                <i data-lucide="file-text" class="w-5 h-5"></i>
                            </div>
                        </div>
                        <div class="flex items-baseline gap-2">
                            <h3 class="text-4xl font-black text-slate-900">12</h3>
                            <span class="text-xs font-semibold text-amber-600 bg-amber-50 px-2 py-0.5 rounded-md">Pending</span>
                        </div>
                    </div>

                </div>

                <!-- Aktivitas Terbaru Section -->
                <div class="bg-white rounded-2xl border border-slate-200/70 shadow-sm p-6">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                            <i data-lucide="activity" class="w-4 h-4 text-blue-600"></i> Aktivitas Terbaru
                        </h3>
                        <a href="#" class="text-xs font-semibold text-blue-600 hover:underline">Lihat Semua</a>
                    </div>
                    
                    <div class="divide-y divide-slate-100">
                        <div class="py-4 flex items-center justify-between first:pt-0 last:pb-0">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-2xl bg-orange-50 text-orange-500 flex items-center justify-center shrink-0 shadow-sm">
                                    <i data-lucide="user-plus" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-slate-800">Mahasiswa baru mendaftar bimbingan</p>
                                    <p class="text-xs text-slate-400 mt-0.5">Bimaka Info</p>
                                </div>
                            </div>
                            <span class="text-xs font-medium text-slate-400 bg-slate-50 px-3 py-1 rounded-full border border-slate-100">10 menit yang lalu</span>
                        </div>

                        <div class="py-4 flex items-center justify-between first:pt-0 last:pb-0">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center shrink-0 shadow-sm">
                                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-slate-800">Dosen menyetujui pengajuan</p>
                                    <p class="text-xs text-slate-400 mt-0.5">Bimaka Info</p>
                                </div>
                            </div>
                            <span class="text-xs font-medium text-slate-400 bg-slate-50 px-3 py-1 rounded-full border border-slate-100">30 menit yang lalu</span>
                        </div>

                        <div class="py-4 flex items-center justify-between first:pt-0 last:pb-0">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-2xl bg-sky-50 text-sky-500 flex items-center justify-center shrink-0 shadow-sm">
                                    <i data-lucide="file-up" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-slate-800">Mahasiswa mengirimkan berkas</p>
                                    <p class="text-xs text-slate-400 mt-0.5">Bimaka Info</p>
                                </div>
                            </div>
                            <span class="text-xs font-medium text-slate-400 bg-slate-50 px-3 py-1 rounded-full border border-slate-100">1 jam yang lalu</span>
                        </div>
                    </div>
                </div>

            </div>
        </main>

    </div>

    <!-- Script Init Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>