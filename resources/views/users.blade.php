<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User - BIMAKA</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-100 font-sans text-slate-800">
    <div class="flex h-screen overflow-hidden">
        
        <!-- SIDEBAR UTAMA -->
        <aside class="w-64 bg-[#1a2238] p-5 text-slate-300 flex flex-col justify-between shrink-0 shadow-lg">
            <div>
                <!-- Logo Aplikasi -->
                <div class="mb-8 flex items-center gap-3 px-2">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-600 text-white font-bold text-lg shadow">
                        B
                    </div>
                    <span class="text-xl font-bold tracking-wide text-white">BIMAKA</span>
                </div>

                <!-- Menu Navigasi Sidebar -->
                <nav class="space-y-1.5 text-sm font-medium">
                    <a href="/admin" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs text-slate-300 hover:bg-slate-800/60 hover:text-white transition">
                        <i data-lucide="layout-grid" class="h-4 w-4"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="/admin/users" class="flex items-center gap-3 rounded-xl bg-blue-600 px-3.5 py-2.5 text-xs text-white transition">
                        <i data-lucide="users" class="h-4 w-4"></i>
                        <span>Data User</span>
                    </a>
                    <a href="/admin/jadwal" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs text-slate-300 hover:bg-slate-800/60 hover:text-white transition">
                        <i data-lucide="calendar" class="h-4 w-4"></i>
                        <span>Jadwal</span>
                    </a>
                    <a href="/admin/pengajuan" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs text-slate-300 hover:bg-slate-800/60 hover:text-white transition">
                        <i data-lucide="file-text" class="h-4 w-4"></i>
                        <span>Pengajuan Bimbingan</span>
                    </a>
                    <a href="/admin/laporan" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs text-slate-300 hover:bg-slate-800/60 hover:text-white transition">
                        <i data-lucide="bar-chart-2" class="h-4 w-4"></i>
                        <span>Laporan</span>
                    </a>
                    <a href="/admin/notifikasi" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs text-slate-300 hover:bg-slate-800/60 hover:text-white transition">
                        <i data-lucide="bell" class="h-4 w-4"></i>
                        <span>Notifikasi</span>
                    </a>
                    <a href="/admin/pengaturan" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs text-slate-300 hover:bg-slate-800/60 hover:text-white transition">
                        <i data-lucide="settings" class="h-4 w-4"></i>
                        <span>Pengaturan</span>
                    </a>
                </nav>
            </div>

            <!-- Tombol Logout -->
            <div>
                <a href="/logout" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs text-red-400 hover:bg-red-500/10 transition">
                    <i data-lucide="log-out" class="h-4 w-4"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- KONTEN UTAMA HALAMAN DATA USER -->
        <main class="flex-1 overflow-y-auto">
            <!-- Header Atas -->
            <header class="h-16 bg-white border-b border-gray-200 px-8 flex items-center justify-between sticky top-0 z-10">
                <h1 class="text-base font-bold text-gray-800">Manajemen Data User</h1>
                <span class="bg-emerald-100 text-emerald-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                    Admin Utama
                </span>
            </header>

            <!-- Isi Tabel Data User -->
            <div class="p-8">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    
                    <!-- Judul & Tombol Tambah User -->
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-xl font-bold text-gray-800">Daftar Pengguna Sistem</h2>
                            <p class="text-xs text-gray-500 mt-0.5">Data mahasiswa, dosen, dan admin BIMAKA.</p>
                        </div>
                        <button onclick="alert('Tambah User Clicked')" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-4 py-2.5 rounded-xl flex items-center gap-2 transition shadow-sm">
                            <i data-lucide="plus" class="w-4 h-4"></i>
                            <span>Tambah User</span>
                        </button>
                    </div>

                    <!-- Input Search -->
                    <div class="relative mb-5 max-w-md">
                        <i data-lucide="search" class="w-4 h-4 absolute left-3.5 top-3 text-gray-400"></i>
                        <input type="text" placeholder="Cari nama / email..." class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Filter Pill Role -->
                    <div class="flex items-center gap-2 mb-6 text-xs font-medium">
                        <button class="px-4 py-1.5 rounded-xl bg-blue-600 text-white">Semua</button>
                        <button class="px-4 py-1.5 rounded-xl bg-gray-100 text-gray-600 hover:bg-gray-200">Mahasiswa</button>
                        <button class="px-4 py-1.5 rounded-xl bg-gray-100 text-gray-600 hover:bg-gray-200">Dosen</button>
                        <button class="px-4 py-1.5 rounded-xl bg-gray-100 text-gray-600 hover:bg-gray-200">Admin</button>
                        <span class="ml-auto text-xs text-gray-400 font-medium">Total pengguna: 4</span>
                    </div>

                    <!-- Tabel Data User -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-sm">
                            <thead>
                                <tr class="text-xs font-bold text-gray-400 border-b border-gray-100 uppercase">
                                    <th class="py-3 px-4">NO</th>
                                    <th class="py-3 px-4">NAMA</th>
                                    <th class="py-3 px-4">EMAIL</th>
                                    <th class="py-3 px-4">ROLE</th>
                                    <th class="py-3 px-4">STATUS</th>
                                    <th class="py-3 px-4 text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50 text-sm">
                                <!-- User 1 -->
                                <tr class="hover:bg-gray-50/50">
                                    <td class="py-3.5 px-4 text-gray-400">1</td>
                                    <td class="py-3.5 px-4 font-bold text-gray-800">Robben Sinaga</td>
                                    <td class="py-3.5 px-4 text-gray-500">robbens@gmail.com</td>
                                    <td class="py-3.5 px-4 text-gray-600">Mahasiswa</td>
                                    <td class="py-3.5 px-4">
                                        <span class="bg-emerald-100 text-emerald-700 text-xs px-2.5 py-0.5 rounded-full font-semibold">Aktif</span>
                                    </td>
                                    <td class="py-3.5 px-4 text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            <button class="text-blue-500 hover:text-blue-700"><i data-lucide="pencil" class="w-4 h-4"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- User 2 -->
                                <tr class="hover:bg-gray-50/50">
                                    <td class="py-3.5 px-4 text-gray-400">2</td>
                                    <td class="py-3.5 px-4 font-bold text-gray-800">Dr. Budi Santoso</td>
                                    <td class="py-3.5 px-4 text-gray-500">budi@polibatam.ac.id</td>
                                    <td class="py-3.5 px-4 text-gray-600">Dosen</td>
                                    <td class="py-3.5 px-4">
                                        <span class="bg-emerald-100 text-emerald-700 text-xs px-2.5 py-0.5 rounded-full font-semibold">Aktif</span>
                                    </td>
                                    <td class="py-3.5 px-4 text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            <button class="text-blue-500 hover:text-blue-700"><i data-lucide="pencil" class="w-4 h-4"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- User 3 -->
                                <tr class="hover:bg-gray-50/50">
                                    <td class="py-3.5 px-4 text-gray-400">3</td>
                                    <td class="py-3.5 px-4 font-bold text-gray-800">Siti Aisyah</td>
                                    <td class="py-3.5 px-4 text-gray-500">siti@polibatam.ac.id</td>
                                    <td class="py-3.5 px-4 text-gray-600">Mahasiswa</td>
                                    <td class="py-3.5 px-4">
                                        <span class="bg-emerald-100 text-emerald-700 text-xs px-2.5 py-0.5 rounded-full font-semibold">Aktif</span>
                                    </td>
                                    <td class="py-3.5 px-4 text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            <button class="text-blue-500 hover:text-blue-700"><i data-lucide="pencil" class="w-4 h-4"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- User 4 -->
                                <tr class="hover:bg-gray-50/50">
                                    <td class="py-3.5 px-4 text-gray-400">4</td>
                                    <td class="py-3.5 px-4 font-bold text-gray-800">Admin Sistem</td>
                                    <td class="py-3.5 px-4 text-gray-500">admin@bimaka.id</td>
                                    <td class="py-3.5 px-4 text-gray-600">Admin</td>
                                    <td class="py-3.5 px-4">
                                        <span class="bg-emerald-100 text-emerald-700 text-xs px-2.5 py-0.5 rounded-full font-semibold">Aktif</span>
                                    </td>
                                    <td class="py-3.5 px-4 text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            <button class="text-blue-500 hover:text-blue-700"><i data-lucide="pencil" class="w-4 h-4"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Footer Table Pagination -->
                    <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-100 text-xs text-gray-500">
                        <span>Menampilkan 1–4 dari 4 pengguna</span>
                        <div class="flex items-center gap-2">
                            <button class="px-3 py-1.5 rounded-lg border border-gray-200 text-gray-400 disabled:opacity-50" disabled>Sebelumnya</button>
                            <button class="px-3 py-1.5 rounded-lg bg-blue-600 text-white font-medium">1</button>
                            <button class="px-3 py-1.5 rounded-lg border border-gray-200 text-gray-400 disabled:opacity-50" disabled>Berikutnya</button>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <!-- Script Wajib Inisialisasi Ikon Lucide -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>