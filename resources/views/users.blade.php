<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User - BIMAKA</title>
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
                <!-- Dashboard -->
                <a href="/admin" class="flex items-center gap-3 px-3.5 py-2.5 text-slate-300 hover:bg-white/5 hover:text-white rounded-xl text-xs transition">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span>Dashboard</span>
                </a>

                <!-- Data User (Active) -->
                <a href="/admin/users" class="flex items-center gap-3 px-3.5 py-2.5 bg-blue-600 text-white font-medium rounded-xl text-xs transition shadow-sm shadow-blue-500/30">
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
    <main class="flex-1 p-8 bg-[#F8FAFC] overflow-y-auto h-full">
        <div class="max-w-7xl mx-auto space-y-6">
            
            <!-- Header Section (Judul & Tombol Tambah User) -->
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Data User</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Kelola data seluruh pengguna sistem (Mahasiswa, Dosen, dan Admin).</p>
                </div>
                <button class="flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-xl shadow-sm shadow-blue-500/30 transition">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    <span>Tambah User</span>
                </button>
            </div>

            <!-- Card Utama Kelola Data User -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 space-y-5">
                
                <!-- Search Bar & Filter -->
                <div class="space-y-4">
                    <div class="relative max-w-md">
                        <i data-lucide="search" class="absolute left-3.5 top-3 w-4 h-4 text-slate-400"></i>
                        <input 
                            type="text" 
                            placeholder="Cari nama / email..." 
                            class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:bg-white focus:border-blue-500 focus:outline-none transition"
                        />
                    </div>

                    <!-- Filter Tabs -->
                    <div class="flex items-center gap-2 border-b border-slate-100 pb-3">
                        <button class="px-4 py-1.5 bg-blue-600 text-white text-xs font-medium rounded-lg shadow-sm">Semua</button>
                        <button class="px-4 py-1.5 text-slate-600 hover:bg-slate-100 text-xs font-medium rounded-lg transition">Mahasiswa</button>
                        <button class="px-4 py-1.5 text-slate-600 hover:bg-slate-100 text-xs font-medium rounded-lg transition">Dosen</button>
                        <button class="px-4 py-1.5 text-slate-600 hover:bg-slate-100 text-xs font-medium rounded-lg transition">Admin</button>
                    </div>
                </div>

                <!-- Tabel Data User -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs text-slate-600">
                        <thead class="bg-slate-50 text-slate-500 font-semibold uppercase tracking-wider text-[11px] border-y border-slate-100">
                            <tr>
                                <th class="py-3 px-4 w-12 text-center">No</th>
                                <th class="py-3 px-4">Nama</th>
                                <th class="py-3 px-4">Email</th>
                                <th class="py-3 px-4">Role</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 font-medium">
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-3.5 px-4 text-center text-slate-400">1</td>
                                <td class="py-3.5 px-4 font-semibold text-slate-800">Robben Sinaga</td>
                                <td class="py-3.5 px-4 text-slate-500">robbens@gmail.com</td>
                                <td class="py-3.5 px-4 text-slate-700">Mahasiswa</td>
                                <td class="py-3.5 px-4">
                                    <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[10px] font-bold border border-emerald-200/60">
                                        Aktif
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>
                                        <button class="p-1.5 text-rose-500 hover:bg-rose-50 rounded-lg transition">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-3.5 px-4 text-center text-slate-400">2</td>
                                <td class="py-3.5 px-4 font-semibold text-slate-800">Dr. Budi Santoso</td>
                                <td class="py-3.5 px-4 text-slate-500">budi@polibatam.ac.id</td>
                                <td class="py-3.5 px-4 text-slate-700">Dosen</td>
                                <td class="py-3.5 px-4">
                                    <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[10px] font-bold border border-emerald-200/60">
                                        Aktif
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>
                                        <button class="p-1.5 text-rose-500 hover:bg-rose-50 rounded-lg transition">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-3.5 px-4 text-center text-slate-400">3</td>
                                <td class="py-3.5 px-4 font-semibold text-slate-800">Siti Aisyah</td>
                                <td class="py-3.5 px-4 text-slate-500">siti@polibatam.ac.id</td>
                                <td class="py-3.5 px-4 text-slate-700">Mahasiswa</td>
                                <td class="py-3.5 px-4">
                                    <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[10px] font-bold border border-emerald-200/60">
                                        Aktif
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>
                                        <button class="p-1.5 text-rose-500 hover:bg-rose-50 rounded-lg transition">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-3.5 px-4 text-center text-slate-400">4</td>
                                <td class="py-3.5 px-4 font-semibold text-slate-800">Admin Sistem</td>
                                <td class="py-3.5 px-4 text-slate-500">admin@bimaka.id</td>
                                <td class="py-3.5 px-4 text-slate-700">Admin</td>
                                <td class="py-3.5 px-4">
                                    <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[10px] font-bold border border-emerald-200/60">
                                        Aktif
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>
                                        <button class="p-1.5 text-rose-500 hover:bg-rose-50 rounded-lg transition">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Section -->
                <div class="flex items-center justify-end gap-1.5 pt-3">
                    <button class="w-7 h-7 bg-blue-600 text-white font-bold text-xs rounded-lg shadow-sm flex items-center justify-center">1</button>
                    <button class="w-7 h-7 hover:bg-slate-100 text-slate-600 font-medium text-xs rounded-lg flex items-center justify-center transition">2</button>
                    <button class="w-7 h-7 hover:bg-slate-100 text-slate-600 font-medium text-xs rounded-lg flex items-center justify-center transition">3</button>
                    <span class="px-1 text-slate-400 text-xs">...</span>
                    <button class="w-7 h-7 hover:bg-slate-100 text-slate-600 font-medium text-xs rounded-lg flex items-center justify-center transition">
                        <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </button>
                </div>

            </div>

        </div>
    </main>

    <!-- Script Init Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>