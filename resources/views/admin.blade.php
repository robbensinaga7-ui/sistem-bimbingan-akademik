<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BIMAKA</title>
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
                    <a href="/admin" class="flex items-center gap-3 rounded-xl bg-blue-600 px-3.5 py-2.5 text-xs text-white transition">
                        <i data-lucide="layout-grid" class="h-4 w-4"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="/admin/users" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs text-slate-300 hover:bg-slate-800/60 hover:text-white transition">
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

        <!-- KONTEN UTAMA DASHBOARD -->
        <main class="flex-1 overflow-y-auto">
            <!-- Header Atas -->
            <header class="h-16 bg-white border-b border-gray-200 px-8 flex items-center justify-between sticky top-0 z-10">
                <h1 class="text-base font-bold text-gray-800">Dashboard Utama</h1>
                <span class="bg-emerald-100 text-emerald-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                    Admin Utama
                </span>
            </header>

            <!-- Isi Halaman Dashboard (Diberi padding lebih rapat dan ada teks sapaan atas) -->
            <div class="px-8 py-6 space-y-5">
                
                <!-- Teks Sambutan di Bagian Atas agar Tidak Kosong -->
                <div class="flex items-center justify-between bg-white px-6 py-4 rounded-2xl shadow-sm border border-gray-100">
                    <div>
                        <h2 class="text-sm font-bold text-gray-800">Selamat Datang kembali, Admin Utama! 👋</h2>
                        <p class="text-xs text-gray-400 mt-0.5">Berikut adalah ringkasan aktivitas dan statistik sistem bimbingan akademik saat ini.</p>
                    </div>
                    <span class="text-xs font-medium text-blue-600 bg-blue-50 px-3 py-1.5 rounded-xl">Jumat, 23 Okt 2026</span>
                </div>

                <!-- 4 Kartu Statistik Atas -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <div class="text-xs text-gray-400 font-bold mb-1 uppercase tracking-wider">TOTAL PENGGUNA</div>
                        <div class="text-3xl font-bold text-gray-800">4</div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <div class="text-xs text-gray-400 font-bold mb-1 uppercase tracking-wider">TOTAL MAHASISWA</div>
                        <div class="text-3xl font-bold text-blue-600">2</div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <div class="text-xs text-gray-400 font-bold mb-1 uppercase tracking-wider">TOTAL DOSEN</div>
                        <div class="text-3xl font-bold text-emerald-600">1</div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <div class="text-xs text-gray-400 font-bold mb-1 uppercase tracking-wider">BIMBINGAN PENDING</div>
                        <div class="text-3xl font-bold text-amber-500">1</div>
                    </div>
                </div>

                <!-- Bagian Aktivitas Terbaru Sistem -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-lg font-bold text-gray-800 mb-4">Aktivitas Terbaru Sistem</h2>
                    
                    <div class="space-y-3">
                        <!-- Aktivitas 1 -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100">
                            <div>
                                <p class="text-sm font-bold text-gray-800">Robben Sinaga mengajukan bimbingan baru</p>
                                <p class="text-xs text-gray-400 mt-0.5">23 Oktober 2026 - 10:30 WIB</p>
                            </div>
                            <span class="bg-amber-100 text-amber-700 text-xs px-3 py-1 rounded-full font-semibold">Menunggu</span>
                        </div>

                        <!-- Aktivitas 2 -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100">
                            <div>
                                <p class="text-sm font-bold text-gray-800">Siti Aisyah mengunggah revisi BAB II</p>
                                <p class="text-xs text-gray-400 mt-0.5">22 Oktober 2026 - 14:15 WIB</p>
                            </div>
                            <span class="bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full font-semibold">Diperbarui</span>
                        </div>

                        <!-- Aktivitas 3 -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100">
                            <div>
                                <p class="text-sm font-bold text-gray-800">Dr. Budi Santoso menyetujui jadwal bimbingan</p>
                                <p class="text-xs text-gray-400 mt-0.5">21 Oktober 2026 - 09:00 WIB</p>
                            </div>
                            <span class="bg-emerald-100 text-emerald-700 text-xs px-3 py-1 rounded-full font-semibold">Selesai</span>
                        </div>
                    </div>
                </div>

                <!-- Tambahan Konten Ringan di Bawah -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <h3 class="text-sm font-bold text-gray-800 mb-3">Statistik Ringkas Peran Pengguna</h3>
                        <div class="space-y-2 text-xs text-gray-600">
                            <div class="flex justify-between py-1.5 border-b border-gray-100">
                                <span>Mahasiswa Aktif</span>
                                <span class="font-bold text-gray-800">2 Orang</span>
                            </div>
                            <div class="flex justify-between py-1.5 border-b border-gray-100">
                                <span>Dosen Pembimbing</span>
                                <span class="font-bold text-gray-800">1 Orang</span>
                            </div>
                            <div class="flex justify-between py-1.5">
                                <span>Administrator Sistem</span>
                                <span class="font-bold text-gray-800">1 Orang</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <h3 class="text-sm font-bold text-gray-800 mb-3">Informasi Sistem Akademik</h3>
                        <p class="text-xs text-gray-500 leading-relaxed">
                            Sistem Bimbingan Akademik (BIMAKA) berjalan dengan normal. Seluruh sinkronisasi data user dan pengajuan bimbingan terhubung langsung ke database utama.
                        </p>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- Script Inisialisasi Ikon Lucide -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>