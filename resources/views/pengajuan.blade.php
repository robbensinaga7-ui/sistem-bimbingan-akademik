<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Bimbingan - BIMAKA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-100 font-sans text-slate-800">
    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-[#1a2238] p-5 text-slate-300 flex flex-col justify-between shrink-0 shadow-lg">
            <div>
                <div class="mb-8 flex items-center gap-3 px-2">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-600 text-white font-bold text-lg shadow">B</div>
                    <span class="text-xl font-bold tracking-wide text-white">BIMAKA</span>
                </div>

                <nav class="space-y-1.5 text-sm font-medium">
                    <a href="/admin" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs text-slate-300 hover:bg-slate-800/60 hover:text-white transition">
                        <i data-lucide="layout-grid" class="h-4 w-4"></i><span>Dashboard</span>
                    </a>
                    <a href="/admin/users" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs text-slate-300 hover:bg-slate-800/60 hover:text-white transition">
                        <i data-lucide="users" class="h-4 w-4"></i><span>Data User</span>
                    </a>
                    <a href="/admin/jadwal" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs text-slate-300 hover:bg-slate-800/60 hover:text-white transition">
                        <i data-lucide="calendar" class="h-4 w-4"></i><span>Jadwal</span>
                    </a>
                    <a href="/admin/pengajuan" class="flex items-center gap-3 rounded-xl bg-blue-600 px-3.5 py-2.5 text-xs text-white transition">
                        <i data-lucide="file-text" class="h-4 w-4"></i><span>Pengajuan Bimbingan</span>
                    </a>
                    <a href="/admin/laporan" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs text-slate-300 hover:bg-slate-800/60 hover:text-white transition">
                        <i data-lucide="bar-chart-2" class="h-4 w-4"></i><span>Laporan</span>
                    </a>
                    <a href="/admin/notifikasi" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs text-slate-300 hover:bg-slate-800/60 hover:text-white transition">
                        <i data-lucide="bell" class="h-4 w-4"></i><span>Notifikasi</span>
                    </a>
                    <a href="/admin/pengaturan" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs text-slate-300 hover:bg-slate-800/60 hover:text-white transition">
                        <i data-lucide="settings" class="h-4 w-4"></i><span>Pengaturan</span>
                    </a>
                </nav>
            </div>
            <div>
                <a href="/logout" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs text-red-400 hover:bg-red-500/10 transition">
                    <i data-lucide="log-out" class="h-4 w-4"></i><span>Logout</span>
                </a>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto">
            <header class="h-16 bg-white border-b border-gray-200 px-8 flex items-center justify-between sticky top-0 z-10">
                <h1 class="text-base font-bold text-gray-800">Pengajuan Bimbingan Mahasiswa</h1>
                <span class="bg-emerald-100 text-emerald-700 text-xs font-semibold px-3 py-1.5 rounded-full">Admin Utama</span>
            </header>

            <div class="p-8">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-gray-800">Daftar Pengajuan Masuk</h2>
                        <p class="text-xs text-gray-500 mt-0.5">Kelola dan konfirmasi pengajuan judul/bimbingan mahasiswa.</p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-sm">
                            <thead>
                                <tr class="text-xs font-bold text-gray-400 border-b border-gray-100 uppercase">
                                    <th class="py-3 px-4">MAHASISWA</th>
                                    <th class="py-3 px-4">JUDUL TA / SKRIPSI</th>
                                    <th class="py-3 px-4">DOSEN PEMBIMBING</th>
                                    <th class="py-3 px-4">STATUS</th>
                                    <th class="py-3 px-4 text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                <tr class="hover:bg-gray-50/50">
                                    <td class="py-3.5 px-4 font-bold text-gray-800">Robben Sinaga</td>
                                    <td class="py-3.5 px-4 text-gray-600">Rancang Bangun Sistem Informasi Bimbingan Tugas Akhir</td>
                                    <td class="py-3.5 px-4 text-gray-600">Dr. Budi Santoso</td>
                                    <td class="py-3.5 px-4">
                                        <span class="bg-amber-100 text-amber-700 text-xs px-2.5 py-0.5 rounded-full font-semibold">Menunggu</span>
                                    </td>
                                    <td class="py-3.5 px-4 text-center">
                                        <div class="flex justify-center gap-2">
                                            <button onclick="alert('Disetujui')" class="bg-blue-600 text-white text-xs px-3 py-1 rounded-lg hover:bg-blue-700">Setujui</button>
                                            <button onclick="alert('Ditolak')" class="bg-red-100 text-red-600 text-xs px-3 py-1 rounded-lg hover:bg-red-200">Tolak</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50/50">
                                    <td class="py-3.5 px-4 font-bold text-gray-800">Siti Aisyah</td>
                                    <td class="py-3.5 px-4 text-gray-600">Analisis Sentimen Menggunakan Metode Machine Learning</td>
                                    <td class="py-3.5 px-4 text-gray-600">Dr. Budi Santoso</td>
                                    <td class="py-3.5 px-4">
                                        <span class="bg-emerald-100 text-emerald-700 text-xs px-2.5 py-0.5 rounded-full font-semibold">Disetujui</span>
                                    </td>
                                    <td class="py-3.5 px-4 text-center">
                                        <span class="text-xs text-gray-400 font-medium">Selesai</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>lucide.createIcons();</script>
</body>
</html>