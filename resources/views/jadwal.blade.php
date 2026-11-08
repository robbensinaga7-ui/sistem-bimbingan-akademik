<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Jadwal - BIMAKA Academic Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in { animation: fadeIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
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
                    <a href="/admin/jadwal" class="flex items-center gap-3.5 px-4 py-3.5 bg-blue-600 text-white rounded-2xl font-semibold shadow-md shadow-blue-600/20 text-sm">
                        <span class="text-lg"></span> Jadwal
                    </a>
                    <a href="/admin/pengajuan" class="flex items-center gap-3.5 px-4 py-3.5 text-slate-300 hover:bg-slate-800/80 hover:text-white rounded-2xl font-medium transition text-sm">
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

            <!-- ISI KONTEN KELOLA JADWAL -->
            <div class="p-8 space-y-6 animate-fade-in max-w-7xl mx-auto w-full">
                
                <!-- Judul & Tombol Tambah Jadwal -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Kelola Jadwal</h2>
                        <p class="text-sm text-slate-500 mt-1">Atur dan kelola ketersediaan waktu bimbingan akademik dosen.</p>
                    </div>
                    <button onclick="openModal()" class="inline-flex items-center justify-center gap-2 bg-blue-700 hover:bg-blue-800 text-white text-xs px-6 py-3 rounded-2xl font-bold shadow-lg shadow-blue-700/25 transition-all duration-200 hover:scale-105 active:scale-95">
                        <span>+</span> Tambah Jadwal
                    </button>
                </div>

                <!-- Kotak Pencarian Jadwal -->
                <div class="bg-white p-4 rounded-3xl border border-slate-200/80 shadow-sm flex items-center">
                    <div class="relative w-full sm:w-96">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm">🔍</span>
                        <input type="text" placeholder="Cari jadwal..." class="w-full pl-10 pr-4 py-2.5 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-xs font-medium bg-slate-50/50">
                    </div>
                </div>

                <!-- Tabel Daftar Jadwal Dosen -->
                <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-sm">
                            <thead>
                                <tr class="bg-slate-50/80 text-slate-400 uppercase text-[11px] tracking-wider border-b border-slate-100 font-bold">
                                    <th class="px-6 py-4">No</th>
                                    <th class="px-6 py-4">Dosen</th>
                                    <th class="px-6 py-4">Hari</th>
                                    <th class="px-6 py-4">Jam</th>
                                    <th class="px-6 py-4">Ruang</th>
                                    <th class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                        <tbody class="divide-y divide-slate-100">
    @if(isset($jadwalList) && count($jadwalList) > 0)
        @foreach($jadwalList as $index => $item)
        <tr class="hover:bg-slate-50/50 transition">
            <!-- Kolom No -->
            <td class="py-4 px-6 font-bold text-slate-500">{{ $index + 1 }}</td>
            
            <!-- Kolom Dosen -->
            <td class="py-4 px-6 font-bold text-slate-900">{{ $item->nama_dosen }}</td>
            
            <!-- Kolom Hari -->
            <td class="py-4 px-6 text-slate-700 font-medium">{{ $item->hari }}</td>
            
            <!-- Kolom Jam (MEMUNCULKAN JAM MULAI & SELESAI) -->
            <td class="py-4 px-6">
                <span class="inline-flex items-center gap-1 px-3 py-1 bg-blue-50 text-blue-700 rounded-xl text-xs font-bold">
                     {{ $item->jam_mulai }} - {{ $item->jam_selesai }}
                </span>
            </td>
            
            <!-- Kolom Ruang -->
            <td class="py-4 px-6 text-slate-600 font-medium">{{ $item->ruang }}</td>
            
            <!-- Kolom Aksi -->
            <td class="py-4 px-6 text-right">
                <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-bold rounded-full">{{ $item->status ?? 'Tersedia' }}</span>
            </td>
        </tr>
        @endforeach
    @else
        <tr id="emptyRow">
            <td colspan="6" class="py-16 text-center text-slate-400">
                <div class="text-4xl mb-2"></div>
                <p class="text-sm font-bold text-slate-700">Belum ada agenda jadwal bimbingan.</p>
                <p class="text-xs text-slate-400 mt-1">Jadwal yang ditambahkan oleh dosen akan tampil di sini.</p>
            </td>
        </tr>
    @endif
</tbody>
                        </table>
                    </div>

                    <!-- Footer Pagination -->
                    <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                        <p class="font-medium">Menampilkan seluruh data jadwal aktif</p>
                        <div class="flex items-center gap-1 font-bold">
                            <span class="px-3 py-1.5 bg-blue-900 text-white rounded-xl shadow-sm">1</span>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- MODAL TAMBAH JADWAL -->
    <div id="jadwalModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-8 shadow-2xl border border-slate-100 animate-fade-in">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-xl font-extrabold text-slate-900">Tambah Jadwal Dosen</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Atur slot waktu bimbingan baru.</p>
                </div>
                <button type="button" onclick="closeModal()" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-slate-200 font-bold transition">✕</button>
            </div>
            
            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Nama Dosen</label>
                    <input type="text" name="nama_dosen" required placeholder="Contoh: Dr. Budi Santoso" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-medium bg-slate-50/50">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Hari</label>
                    <select name="hari" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-medium bg-slate-50/50">
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-medium bg-slate-50/50">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Jam Selesai</label>
                        <input type="time" name="jam_selesai" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-medium bg-slate-50/50">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Ruangan</label>
                    <input type="text" name="ruang" required placeholder="Contoh: R. 101" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-medium bg-slate-50/50">
                </div>
                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeModal()" class="flex-1 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-2xl text-sm transition">Batal</button>
                    <button type="submit" class="flex-1 py-3 bg-blue-700 hover:bg-blue-800 text-white font-bold rounded-2xl text-sm shadow-md shadow-blue-700/20 transition">Simpan Jadwal</button>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPT MODAL -->
    <script>
        const modal = document.getElementById('jadwalModal');
        function openModal() {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
        function closeModal() {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    </script>
</body>
</html>