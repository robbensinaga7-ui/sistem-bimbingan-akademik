<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Saya - Portal Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-100 flex h-screen overflow-hidden">

    <!-- SIDEBAR KIRI -->
    <aside class="w-64 bg-[#0f172a] text-white flex flex-col justify-between p-6">
        <div>
            <div class="flex items-center gap-3 mb-10">
                <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center font-extrabold text-lg shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-extrabold tracking-wide">BIMAKA</h2>
                    <span class="text-[10px] text-blue-400 font-bold tracking-wider uppercase">Bimbingan Akademik</span>
                </div>
            </div>

            <nav class="space-y-1.5">
                <a href="{{ route('dosen.dashboard') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg">📊</span> Dashboard
                </a>
                <a href="{{ route('dosen.jadwal') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl bg-blue-600 text-white font-semibold text-sm shadow-md shadow-blue-600/30">
                    <span class="text-lg">📅</span> Jadwal Saya
                </a>
                <a href="{{ route('dosen.pengajuan') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg">📋</span> Pengajuan Bimbingan
                </a>
                <a href="{{ route('dosen.catatan') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg">⏱️</span> Riwayat Bimbingan
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg">🔔</span> Notifikasi
                </a>
            </nav>
        </div>

        <div>
            <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-500/10 rounded-2xl font-semibold transition text-sm">
                <span class="text-lg">🚪</span> Keluar Portal
            </a>
        </div>
    </aside>

    <!-- KONTEN UTAMA -->
    <main class="flex-1 flex flex-col overflow-y-auto">
        
        <!-- NAVBAR ATAS -->
        <header class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between">
            <div class="text-xs font-bold text-slate-400 tracking-wide uppercase">
                PORTAL AKADEMIK • TAHUN AJARAN 2024/2025 GENAP
            </div>
            
            <div class="flex items-center gap-4">
                <button class="w-10 h-10 rounded-full bg-slate-100 hover:bg-slate-200 flex items-center justify-center text-slate-600 transition">🔍</button>
                <button class="w-10 h-10 rounded-full bg-slate-100 hover:bg-slate-200 flex items-center justify-center text-slate-600 transition">🔔</button>

                <div class="flex items-center gap-3 pl-2 border-l border-slate-200">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-slate-900">{{ session('dosen_nama', 'Dosen Pembimbing') }}</p>
                        <p class="text-[11px] text-slate-400">NIDN: {{ session('dosen_nidn', '-') }}</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-blue-900 text-white flex items-center justify-center font-bold">
                        {{ substr(session('dosen_nama', 'D'), 0, 1) }}
                    </div>
                </div>
            </div>
        </header>

        <div class="p-8 space-y-6 max-w-7xl mx-auto w-full">
            
            <!-- HEADER JUDUL & TOMBOL TAMBAH -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Jadwal Saya</h1>
                    <p class="text-sm text-slate-500 mt-1">Kelola alokasi waktu sesi bimbingan tatap muka mingguan dengan mahasiswa bimbingan.</p>
                </div>
                <button onclick="openModal()" class="inline-flex items-center justify-center gap-2 bg-blue-700 hover:bg-blue-800 text-white text-xs px-6 py-3 rounded-2xl font-bold shadow-lg shadow-blue-700/25 transition-all">
                    <span>+</span> Tambah Jadwal
                </button>
            </div>

            <!-- PENCARIAN -->
            <div class="bg-white p-4 rounded-3xl border border-slate-200 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="relative w-full sm:w-96">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm">🔍</span>
                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari jadwal berdasarkan hari, ruang, atau topik..." class="w-full pl-10 pr-4 py-2.5 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-xs font-medium bg-slate-50/50">
                </div>
                <div class="text-xs font-bold text-slate-500 px-2">
                    Menampilkan entri aktif
                </div>
            </div>

            <!-- TABEL JADWAL -->
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table id="jadwalTable" class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-slate-50 text-slate-400 text-[11px] font-bold uppercase tracking-wider border-b border-slate-100">
                                <th class="py-4 px-6">Hari</th>
                                <th class="py-4 px-6">Jam</th>
                                <th class="py-4 px-6">Ruang</th>
                                <th class="py-4 px-6">Keterangan</th>
                                <th class="py-4 px-6 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @if(isset($jadwalList) && count($jadwalList) > 0)
                                @foreach($jadwalList as $jadwal)
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="py-4 px-6 font-bold text-slate-900">{{ $jadwal->hari }}</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center gap-1 px-3 py-1 bg-blue-50 text-blue-700 rounded-xl text-xs font-bold">
                                            ⏰ {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 font-medium text-slate-700">{{ $jadwal->ruang }}</td>
                                    <td class="py-4 px-6">
                                        <span class="px-3 py-1 bg-slate-100 text-slate-700 rounded-xl text-xs font-bold">
                                            {{ $jadwal->topik }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right space-x-2">
                                        <!-- Tombol Edit -->
                                        <button onclick="editModal('{{ $jadwal->id }}', '{{ $jadwal->hari }}', '{{ $jadwal->jam_mulai }}', '{{ $jadwal->jam_selesai }}', '{{ $jadwal->ruang }}', '{{ $jadwal->topik }}')" class="p-2 rounded-xl bg-slate-100 text-slate-600 hover:bg-slate-200 transition text-xs font-bold" title="Edit">✏️</button>
                                        
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('dosen.jadwal.destroy', $jadwal->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 rounded-xl bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition text-xs font-bold" title="Hapus">🗑️</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr id="emptyRow">
                                    <td colspan="5" class="py-16 text-center text-slate-400">
                                        <div class="text-4xl mb-2">📅</div>
                                        <p class="text-sm font-bold text-slate-700">Belum ada jadwal bimbingan yang ditambahkan.</p>
                                        <p class="text-xs text-slate-400 mt-1">Klik tombol "+ Tambah Jadwal" di atas untuk membuat jadwal sesi bimbingan baru.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- PAGINATION FOOTER -->
                <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                    <p class="font-medium">Menampilkan data jadwal aktif dosen</p>
                    <div class="flex items-center gap-1 font-bold">
                        <span class="px-3 py-1.5 bg-blue-900 text-white rounded-xl shadow-sm">1</span>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- MODAL POPUP TAMBAH / EDIT JADWAL -->
    <div id="tambahJadwalModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-3xl shadow-2xl max-w-lg w-full p-8 space-y-6 animate-fade-in">
            <div class="flex justify-between items-center border-b border-slate-100 pb-4">
                <h3 id="modalTitle" class="text-lg font-extrabold text-slate-900">Tambah Jadwal Bimbingan Baru</h3>
                <button onclick="closeModal()" class="w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 flex items-center justify-center text-slate-500 font-bold">✕</button>
            </div>

            <form id="jadwalForm" action="{{ route('dosen.jadwal.store') }}" method="POST" class="space-y-4">
                @csrf
                <div id="methodField"></div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Hari</label>
                    <select name="hari" id="hari" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-xs font-medium bg-slate-50" required>
                        <option value="">Pilih Hari</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Jam Mulai</label>
                        <input type="time" name="jam_mulai" id="jam_mulai" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-xs font-medium bg-slate-50" required>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Jam Selesai</label>
                        <input type="time" name="jam_selesai" id="jam_selesai" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-xs font-medium bg-slate-50" required>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Ruangan</label>
                    <input type="text" name="ruang" id="ruang" placeholder="Contoh: Ruang 101 / Online" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-xs font-medium bg-slate-50" required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Keterangan / Topik</label>
                    <input type="text" name="keterangan" id="keterangan" placeholder="Contoh: Bimbingan TA / Skripsi" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-xs font-medium bg-slate-50" required>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" onclick="closeModal()" class="px-5 py-2.5 rounded-2xl bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold transition">Batal</button>
                    <button type="submit" class="px-6 py-2.5 rounded-2xl bg-blue-700 hover:bg-blue-800 text-white text-xs font-bold shadow-md shadow-blue-700/20 transition">Simpan Jadwal</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT MODAL & PENCARIAN -->
    <script>
        const modal = document.getElementById('tambahJadwalModal');
        const form = document.getElementById('jadwalForm');
        const modalTitle = document.getElementById('modalTitle');
        const methodField = document.getElementById('methodField');

        function openModal() {
            modalTitle.textContent = "Tambah Jadwal Bimbingan Baru";
            form.action = "{{ route('dosen.jadwal.store') }}";
            methodField.innerHTML = ""; // Kosongkan method PUT karena ini POST (tambah baru)
            
            // Reset input form
            form.reset();
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function editModal(id, hari, jamMulai, jamSelesai, ruang, topik) {
            modalTitle.textContent = "Edit Jadwal Bimbingan";
            form.action = "/dosen/jadwal/" + id;
            methodField.innerHTML = '@method("PUT")'; // Sisipkan method spoofing PUT untuk edit
            
            // Masukkan data lama ke dalam input form
            document.getElementById('hari').value = hari;
            document.getElementById('jam_mulai').value = jamMulai;
            document.getElementById('jam_selesai').value = jamSelesai;
            document.getElementById('ruang').value = ruang;
            document.getElementById('keterangan').value = topik;
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        function searchTable() {
            let input = document.getElementById('searchInput');
            let filter = input.value.toLowerCase();
            let table = document.getElementById('jadwalTable');
            let tr = table.getElementsByTagName('tr');

            for (let i = 1; i < tr.length; i++) {
                if (tr[i].id === 'emptyRow') continue;
                let txtValue = tr[i].textContent || tr[i].innerText;
                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    </script>

</body>
</html>