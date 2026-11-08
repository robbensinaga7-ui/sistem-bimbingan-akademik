<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna - BIMAKA Academic Portal</title>
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
                        <span class="text-lg">📊</span> Dashboard
                    </a>
                    <a href="/admin/users" class="flex items-center gap-3.5 px-4 py-3.5 bg-blue-600 text-white rounded-2xl font-semibold shadow-md shadow-blue-600/20 text-sm">
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

            <!-- ISI KONTEN -->
            <div class="p-8 space-y-6 animate-fade-in max-w-7xl mx-auto w-full">
                
                <!-- Judul & Tombol Tambah -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Data User</h2>
                        <p class="text-sm text-slate-500 mt-1">Kelola seluruh akses, akun dosen, mahasiswa, dan staf akademik secara terpusat[cite: 6].</p>
                    </div>
                    <button onclick="openModal()" class="inline-flex items-center justify-center gap-2 bg-blue-700 hover:bg-blue-800 text-white text-xs px-6 py-3 rounded-2xl font-bold shadow-lg shadow-blue-700/25 transition-all duration-200 hover:scale-105 active:scale-95">
                        <span>+</span> Tambah User
                    </button>
                </div>

               <!-- Tab Filter & Pencarian -->
                <form method="GET" action="{{ route('admin.users') }}" class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-4 rounded-3xl border border-slate-200/80 shadow-sm">
                    <div class="flex items-center gap-2 overflow-x-auto">
                        <a href="{{ route('admin.users') }}" class="px-5 py-2.5 {{ !request('role') ? 'bg-blue-900 text-white shadow-sm' : 'bg-slate-100 hover:bg-slate-200 text-slate-600' }} text-xs font-bold rounded-2xl transition">Semua</a>
                        
                        <a href="{{ route('admin.users', ['role' => 'Mahasiswa', 'search' => request('search')]) }}" class="px-5 py-2.5 {{ request('role') == 'Mahasiswa' ? 'bg-blue-900 text-white shadow-sm' : 'bg-slate-100 hover:bg-slate-200 text-slate-600' }} text-xs font-bold rounded-2xl transition">Mahasiswa</a>
                        
                        <a href="{{ route('admin.users', ['role' => 'Dosen', 'search' => request('search')]) }}" class="px-5 py-2.5 {{ request('role') == 'Dosen' ? 'bg-blue-900 text-white shadow-sm' : 'bg-slate-100 hover:bg-slate-200 text-slate-600' }} text-xs font-bold rounded-2xl transition">Dosen</a>
                    </div>

                    <input type="hidden" name="role" value="{{ request('role') }}">

                    <div class="relative w-full sm:w-72">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm">🔍</span>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama / NIM / NIDN..." class="w-full pl-10 pr-4 py-2.5 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-xs font-medium bg-slate-50/50">
                    </div>
                </form>
             

                <!-- Tabel Data User -->
                <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-sm">
                            <thead>
                                <tr class="bg-slate-50/80 text-slate-400 uppercase text-[11px] tracking-wider border-b border-slate-100 font-bold">
                                    <th class="px-6 py-4">No</th>
                                    <th class="px-6 py-4">Nama Lengkap</th>
                                    <th class="px-6 py-4">NIM / NIDN</th>
                                    <th class="px-6 py-4">Peran (Role)</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($users as $index => $user)
                                <tr class="hover:bg-slate-50/60 transition-colors">
                                    <td class="px-6 py-4 font-bold text-slate-400 text-xs">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 rounded-xl {{ $user->role == 'Mahasiswa' ? 'bg-blue-100 text-blue-700' : 'bg-indigo-100 text-indigo-700' }} flex items-center justify-center font-bold text-xs shadow-inner">
                                                {{ substr($user->nama, 0, 2) }}
                                            </div>
                                            <span class="font-bold text-slate-900">{{ $user->nama }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-slate-500 font-mono text-xs">{{ $user->nim_nidn }}</td>
                                    <td class="px-6 py-4">
                                        <span class="{{ $user->role == 'Mahasiswa' ? 'bg-blue-50 text-blue-700 border-blue-200/60' : 'bg-indigo-50 text-indigo-700 border-indigo-200/60' }} border text-[11px] px-3 py-1 rounded-full font-bold">
                                            {{ $user->role }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200/60">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Aktif
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini dari database?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 rounded-xl bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition shadow-sm text-xs font-bold" title="Hapus User">
                                                    🗑️ Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-14 text-center text-slate-400 font-medium">
                                        <div class="flex flex-col items-center justify-center space-y-2">
                                            <span class="text-4xl">📭</span>
                                            <p class="text-sm font-bold text-slate-700">Belum ada data user di database MySQL.</p>
                                            <p class="text-xs text-slate-400">Klik tombol "+ Tambah User" di pojok kanan atas untuk mulai menambahkan akun.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Footer Pagination Info -->
                    <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                        <p class="font-medium">Menampilkan total seluruh data pengguna aktif database</p>
                        <div class="flex items-center gap-1 font-bold">
                            <span class="px-3 py-1.5 bg-blue-900 text-white rounded-xl shadow-sm">1</span>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- MODAL FORM TAMBAH USER -->
    <div id="userModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-8 shadow-2xl border border-slate-100 animate-fade-in">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-xl font-extrabold text-slate-900">Tambah User Baru</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Akun akan langsung tersimpan ke database MySQL.</p>
                </div>
                <button type="button" onclick="closeModal()" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-slate-200 font-bold transition">✕</button>
            </div>
            
            <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Nama Lengkap</label>
                    <input type="text" name="nama" required placeholder="Contoh: Budi Santoso" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-medium bg-slate-50/50">
                </div>
                
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">NIM / NIDN (Username Login)</label>
                    <input type="text" name="nim_nidn" required placeholder="Contoh: 3312511099" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-medium bg-slate-50/50">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Kata Sandi (Password)</label>
                    <input type="password" name="password" required placeholder="Minimal 6 karakter" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-medium bg-slate-50/50">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Peran (Role)</label>
                    <select name="role" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-medium bg-slate-50/50">
                        <option value="Mahasiswa">Mahasiswa</option>
                        <option value="Dosen">Dosen</option>
                    </select>
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeModal()" class="flex-1 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-2xl text-sm transition">Batal</button>
                    <button type="submit" class="flex-1 py-3 bg-blue-700 hover:bg-blue-800 text-white font-bold rounded-2xl text-sm shadow-md shadow-blue-700/20 transition">Simpan User</button>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPT MODAL -->
    <script>
        const modal = document.getElementById('userModal');

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