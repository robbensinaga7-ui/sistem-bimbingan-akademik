<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Bimbingan - Portal Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in { animation: fadeIn 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    </style>
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
                <a href="{{ route('student.dashboard') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg">📊</span> Dashboard
                </a>
                <a href="{{ route('mahasiswa.daftar-bimbingan') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl bg-blue-600 text-white font-semibold text-sm shadow-md shadow-blue-600/30">
                    <span class="text-lg">📅</span> Daftar Bimbingan
                </a>
                <a href="{{ route('mahasiswa.jadwal') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg">⏰</span> Jadwal
                </a>
                <a href="{{ route('mahasiswa.status-pengajuan') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg">📋</span> Status Pengajuan
                </a>
                <a href="{{ route('mahasiswa.notifikasi') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg">🔔</span> Notifikasi
                </a>
            </nav>
        </div>

        <div>
            <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-500/10 rounded-2xl font-semibold transition text-sm">
                <span class="text-lg">🚪</span> Logout
            </a>
        </div>
    </aside>

    <!-- KONTEN UTAMA -->
    <main class="flex-1 flex flex-col overflow-y-auto">
        
        <!-- NAVBAR ATAS -->
        <header class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between">
            <div class="text-xs font-bold text-slate-500 tracking-wide">
                Portal Mahasiswa <span class="mx-2 text-slate-300">/</span> <span class="text-slate-900">Daftar Bimbingan</span>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-slate-900">{{ session('mahasiswa_nama', 'Robben Sinaga') }}</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-extrabold text-xs shadow-sm">
                    {{ substr(session('mahasiswa_nama', 'Robben Sinaga'), 0, 2) }}
                </div>
            </div>
        </header>

        <div class="p-8 space-y-6 max-w-7xl mx-auto w-full">
            
            <!-- HEADER JUDUL & KETERANGAN -->
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Daftar Bimbingan</h1>
                <p class="text-sm text-slate-500 mt-1">Pilih jadwal bimbingan akademik yang tersedia dengan dosen pembimbing.</p>
            </div>

            <!-- PENCARIAN -->
            <div class="bg-white p-4 rounded-3xl border border-slate-200 shadow-sm">
                <div class="relative w-full">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 text-sm">🔍</span>
                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari dosen / topik..." class="w-full pl-11 pr-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-600 text-xs font-medium bg-slate-50/50">
                </div>
            </div>

            <!-- TABEL DAFTAR BIMBINGAN -->
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table id="daftarBimbinganTable" class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-slate-50 text-slate-400 text-[11px] font-bold uppercase tracking-wider border-b border-slate-100">
                                <th class="py-4 px-6 w-16">No</th>
                                <th class="py-4 px-6">Dosen</th>
                                <th class="py-4 px-6">Hari & Jam</th>
                                <th class="py-4 px-6">Ruang</th>
                                <th class="py-4 px-6">Topik / Keterangan</th>
                                <th class="py-4 px-6 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @if(isset($daftarBimbinganList) && count($daftarBimbinganList) > 0)
                                @foreach($daftarBimbinganList as $index => $item)
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="py-4 px-6 font-bold text-slate-500">{{ $index + 1 }}</td>
                                    <td class="py-4 px-6 font-bold text-slate-900">{{ $item->nama_dosen }}</td>
                                    <td class="py-4 px-6 text-slate-700 font-medium">
                                        {{ $item->hari }} 
                                        <span class="block text-xs text-blue-600 font-bold">⏰ {{ $item->jam_mulai }} - {{ $item->jam_selesai }}</span>
                                    </td>
                                    <td class="py-4 px-6 text-slate-600 font-medium">{{ $item->ruang }}</td>
                                    <td class="py-4 px-6 font-medium text-slate-600">{{ $item->topik }}</td>
                                    <td class="py-4 px-6 text-right">
                                        <!-- Tombol untuk Mendaftar / Mengajukan Bimbingan -->
                                        <button onclick="openAjukanModal('{{ $item->nama_dosen }}', '{{ $item->topik }}', '{{ $item->hari }}, {{ $item->jam_mulai }} - {{ $item->jam_selesai }}')" 
                                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl shadow transition">
                                            Daftar Bimbingan
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr id="emptyRow">
                                    <td colspan="6" class="py-16 text-center text-slate-400">
                                        <div class="text-4xl mb-2">📅</div>
                                        <p class="text-sm font-bold text-slate-700">Belum ada jadwal bimbingan tersedia.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- PAGINATION FOOTER -->
                <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                    <p class="font-medium">Menampilkan data jadwal aktif</p>
                    <div class="flex items-center gap-1 font-bold">
                        <span class="px-3 py-1.5 bg-blue-900 text-white rounded-xl shadow-sm">1</span>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- MODAL POPUP AJUKAN BIMBINGAN -->
    <div id="ajukanModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-3xl shadow-2xl max-w-lg w-full p-8 space-y-6 animate-fade-in">
            <div class="flex justify-between items-center border-b border-slate-100 pb-4">
                <div>
                    <h3 class="text-lg font-extrabold text-slate-900">Form Pengajuan Bimbingan</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Konfirmasi detail sesi konsultasi bimbingan akademik.</p>
                </div>
                <button type="button" onclick="closeAjukanModal()" class="w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 flex items-center justify-center text-slate-500 font-bold">✕</button>
            </div>

            <!-- Form Mengarah ke StudentController@store -->
            <form action="{{ route('student.konsultasi.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Dosen Pembimbing</label>
                    <input type="text" id="modalNamaDosen" name="nama_dosen" readonly class="w-full px-4 py-3 rounded-2xl border border-slate-200 text-xs font-bold bg-slate-100 text-slate-700">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Topik / Keterangan</label>
                    <input type="text" id="modalTopik" name="topik" required class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-xs font-medium bg-slate-50" placeholder="Masukkan topik konsultasi...">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Waktu / Jadwal Konsultasi</label>
                    <input type="text" id="modalWaktu" name="waktu_konsultasi" required class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-xs font-medium bg-slate-50">
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" onclick="closeAjukanModal()" class="px-5 py-2.5 rounded-2xl bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold transition">Batal</button>
                    <button type="submit" class="px-6 py-2.5 rounded-2xl bg-blue-700 hover:bg-blue-800 text-white text-xs font-bold shadow-md shadow-blue-700/20 transition">Kirim Pengajuan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPT MODAL & PENCARIAN -->
    <script>
        function openAjukanModal(namaDosen, topik, waktu) {
            document.getElementById('modalNamaDosen').value = namaDosen;
            document.getElementById('modalTopik').value = topik;
            document.getElementById('modalWaktu').value = waktu;
            
            let modal = document.getElementById('ajukanModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeAjukanModal() {
            let modal = document.getElementById('ajukanModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        function searchTable() {
            let input = document.getElementById('searchInput');
            let filter = input.value.toLowerCase();
            let table = document.getElementById('daftarBimbinganTable');
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