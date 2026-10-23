<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - BIMAKA</title>
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
                    <a href="/admin/pengajuan" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs text-slate-300 hover:bg-slate-800/60 hover:text-white transition">
                        <i data-lucide="file-text" class="h-4 w-4"></i><span>Pengajuan Bimbingan</span>
                    </a>
                    <a href="/admin/laporan" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs text-slate-300 hover:bg-slate-800/60 hover:text-white transition">
                        <i data-lucide="bar-chart-2" class="h-4 w-4"></i><span>Laporan</span>
                    </a>
                    <a href="/admin/notifikasi" class="flex items-center gap-3 rounded-xl bg-blue-600 px-3.5 py-2.5 text-xs text-white transition">
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
                <h1 class="text-base font-bold text-gray-800">Notifikasi Sistem</h1>
                <span class="bg-emerald-100 text-emerald-700 text-xs font-semibold px-3 py-1.5 rounded-full">Admin Utama</span>
            </header>

            <div class="p-8">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Pemberitahuan Terbaru</h2>

                    <div class="space-y-3">
                        <div class="p-4 bg-blue-50 border-l-4 border-blue-600 rounded-r-xl">
                            <p class="text-sm font-bold text-blue-900">Pengajuan Baru Masuk</p>
                            <p class="text-xs text-blue-700 mt-0.5">Robben Sinaga baru saja mengajukan proposal bimbingan Tugas Akhir.</p>
                        </div>
                        <div class="p-4 bg-emerald-50 border-l-4 border-emerald-600 rounded-r-xl">
                            <p class="text-sm font-bold text-emerald-900">Pembaruan Profil User</p>
                            <p class="text-xs text-emerald-700 mt-0.5">Akun Dr. Budi Santoso berhasil diperbarui oleh sistem.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>lucide.createIcons();</script>
</body>
</html>