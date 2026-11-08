<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Bimbingan - BIMAKA Academic Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in { animation: fadeIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        
        /* Transisi halus saat baris disembunyikan/ditampilkan */
        tr.transition-row {
            transition: all 0.25s ease-in-out;
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
                    <a href="/admin/pengajuan" class="flex items-center gap-3.5 px-4 py-3.5 bg-blue-600 text-white rounded-2xl font-semibold shadow-md shadow-blue-600/20 text-sm">
                        <span class="text-lg"></span> Pengajuan Bimbingan
                    </a>
                    <a href="/admin/laporan" class="flex items-center gap-3.5 px-4 py-3.5 text-slate-300 hover:bg-slate-800/80 hover:text-white rounded-2xl font-medium transition text-sm">
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

            <!-- ISI KONTEN PENGAJUAN BIMBINGAN -->
            <div class="p-8 space-y-6 animate-fade-in max-w-7xl mx-auto w-full">
                
                <!-- Judul & Tombol Aksi Kanan -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Pengajuan Bimbingan</h2>
                        <p class="text-sm text-slate-500 mt-1">Kelola verifikasi permohonan bimbingan skripsi dan tugas akhir mahasiswa.</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <button class="inline-flex items-center justify-center gap-2 bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-xs px-5 py-3 rounded-2xl font-bold shadow-sm transition">
                            <span>⚙️</span> Filter Lanjutan
                        </button>
                        <button onclick="openModal()" class="inline-flex items-center justify-center gap-2 bg-blue-700 hover:bg-blue-800 text-white text-xs px-6 py-3 rounded-2xl font-bold shadow-lg shadow-blue-700/25 transition-all duration-200 hover:scale-105 active:scale-95">
                            <span>+</span> Tambah Pengajuan
                        </button>
                    </div>
                </div>

                <!-- Tab Filter Status & Pencarian -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-4 rounded-3xl border border-slate-200/80 shadow-sm">
                    <div class="flex items-center gap-2 overflow-x-auto pb-2 md:pb-0" id="filterButtons">
                        <button onclick="filterStatus('Semua', this)" class="px-5 py-2.5 bg-blue-900 text-white text-xs font-bold rounded-2xl shadow-sm transition-all">Semua</button>
                        <button onclick="filterStatus('Menunggu', this)" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold rounded-2xl transition-all">Menunggu</button>
                        <button onclick="filterStatus('Disetujui', this)" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold rounded-2xl transition-all">Disetujui</button>
                        <button onclick="filterStatus('Ditolak', this)" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold rounded-2xl transition-all">Ditolak</button>
                        <button onclick="filterStatus('Dibatalkan', this)" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold rounded-2xl transition-all">Dibatalkan</button>
                    </div>
                    <div class="relative w-full sm:w-72">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm">🔍</span>
                        <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Cari mahasiswa..." class="w-full pl-10 pr-4 py-2.5 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-xs font-medium bg-slate-50/50">
                    </div>
                </div>

                <!-- Tabel Daftar Pengajuan -->
                <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table id="pengajuanTable" class="w-full text-left border-collapse text-sm">
                            <thead>
                                <tr class="bg-slate-50/80 text-slate-400 uppercase text-[11px] tracking-wider border-b border-slate-100 font-bold">
                                    <th class="px-6 py-4">No</th>
                                    <th class="px-6 py-4">Mahasiswa</th>
                                    <th class="px-6 py-4">Dosen</th>
                                    <th class="px-6 py-4">Tanggal</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @if(isset($pengajuanList) && count($pengajuanList) > 0)
                                    @foreach($pengajuanList as $index => $item)
                                    <!-- ATRIBUT data-status DITAMBAHKAN AGAR FILTER BERFUNGSI -->
                                    <tr class="hover:bg-slate-50/60 transition-row" data-status="{{ trim($item->status) }}">
                                        <td class="px-6 py-4 font-bold text-slate-500">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4">
                                            <p class="font-bold text-slate-900">{{ $item->nama_mahasiswa }}</p>
                                            <span class="text-xs text-slate-400">NIM: {{ $item->nim }}</span>
                                        </td>
                                        <td class="px-6 py-4 font-bold text-slate-700">{{ $item->nama_dosen }}</td>
                                        <td class="px-6 py-4">
                                            <p class="text-slate-800 font-medium">{{ $item->topik }}</p>
                                            <span class="text-xs text-slate-400">{{ $item->waktu_konsultasi ?? $item->tanggal }}</span>
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
                                        <td class="px-6 py-4 text-center space-x-2">
                                            <!-- Tombol Hapus oleh Admin -->
                                            <form action="{{ route('admin.pengajuan.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus pengajuan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1.5 bg-red-50 hover:bg-red-600 text-red-600 hover:text-white rounded-xl text-xs font-bold transition-all shadow-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr id="emptyRow">
                                        <td colspan="6" class="px-6 py-14 text-center text-slate-400 font-medium">
                                            <div class="flex flex-col items-center justify-center space-y-2">
                                                <span class="text-4xl">📭</span>
                                                <p class="text-sm font-bold text-slate-700">Belum ada pengajuan bimbingan terdaftar.</p>
                                                <p class="text-xs text-slate-400">Klik tombol "+ Tambah Pengajuan" di atas untuk menambahkan pengajuan baru.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <!-- Footer Pagination -->
                    <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                        <p class="font-medium">Menampilkan seluruh data pengajuan aktif</p>
                        <div class="flex items-center gap-1 font-bold">
                            <span class="px-3 py-1.5 bg-blue-900 text-white rounded-xl shadow-sm">1</span>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- MODAL TAMBAH PENGAJUAN -->
    <div id="pengajuanModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-8 shadow-2xl border border-slate-100 animate-fade-in">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-xl font-extrabold text-slate-900">Tambah Pengajuan Baru</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Input data permohonan bimbingan mahasiswa.</p>
                </div>
                <button type="button" onclick="closeModal()" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-slate-200 font-bold transition">✕</button>
            </div>
            
            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Nama Mahasiswa</label>
                    <input type="text" name="nama_mahasiswa" required placeholder="Contoh: Alya Maharani" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-medium bg-slate-50/50">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">NIM Mahasiswa</label>
                    <input type="text" name="nim" required placeholder="Contoh: 2110511042" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-medium bg-slate-50/50">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Dosen Pembimbing</label>
                    <input type="text" name="nama_dosen" required placeholder="Contoh: Dr. Budi Santoso" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-medium bg-slate-50/50">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Tanggal Konsultasi</label>
                    <input type="date" name="tanggal" required class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-medium bg-slate-50/50">
                </div>
                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeModal()" class="flex-1 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-2xl text-sm transition">Batal</button>
                    <button type="submit" class="flex-1 py-3 bg-blue-700 hover:bg-blue-800 text-white font-bold rounded-2xl text-sm shadow-md shadow-blue-700/20 transition">Simpan Pengajuan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPT MODAL, FILTER STATUS & ANIMASI -->
    <script>
        const modal = document.getElementById('pengajuanModal');
        function openModal() {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
        function closeModal() {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        let currentStatus = 'Semua';

        function filterStatus(status, btn) {
            currentStatus = status;
            
            // Ubah gaya warna tombol aktif
            let buttons = document.querySelectorAll('#filterButtons button');
            buttons.forEach(b => {
                b.className = "px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold rounded-2xl transition-all";
            });
            btn.className = "px-5 py-2.5 bg-blue-900 text-white text-xs font-bold rounded-2xl shadow-sm transition-all";

            applyFilters();
        }

        function filterTable() {
            applyFilters();
        }

        function applyFilters() {
            let input = document.getElementById('searchInput');
            let filter = input.value.toLowerCase();
            let table = document.getElementById('pengajuanTable');
            let tr = table.getElementsByTagName('tr');

            for (let i = 1; i < tr.length; i++) {
                if (tr[i].id === 'emptyRow') continue;

                let rowStatus = tr[i].getAttribute('data-status');
                let txtValue = tr[i].textContent || tr[i].innerText;

                let matchStatus = (currentStatus === 'Semua' || (rowStatus && rowStatus.toLowerCase() === currentStatus.toLowerCase()));
                let matchSearch = (txtValue.toLowerCase().indexOf(filter) > -1);

                if (matchStatus && matchSearch) {
                    tr[i].style.display = "";
                    tr[i].style.opacity = "1";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    </script>
</body>
</html>